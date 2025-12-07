<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Services\TenantService;

class ValidateTenantAccess
{
    /**
     * Handle an incoming request - ENFORCES TENANT ISOLATION
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = auth()->guard('admin')->user();

        if (!$admin) {
            return redirect()->route('admin.session.create');
        }

        // Get channel from current hostname
        $currentChannel = TenantService::getCurrentChannel();

        if (!$currentChannel) {
            abort(404, 'Store not found');
        }

        // CRITICAL CHECK: Can this admin access this channel?
        if (!TenantService::canAdminAccessChannel($admin, $currentChannel)) {
            // Log unauthorized access attempt
            \Log::warning('Unauthorized tenant access attempt', [
                'admin_id' => $admin->id,
                'admin_email' => $admin->email,
                'admin_channel_id' => $admin->channel_id,
                'attempted_channel_id' => $currentChannel->id,
                'hostname' => $request->getHost(),
            ]);

            // Redirect to their own store
            $adminChannel = \Webkul\Core\Models\Channel::find($admin->channel_id);
            
            if ($adminChannel) {
                return redirect()->away('http://' . $adminChannel->hostname . '/admin/dashboard')
                    ->with('error', 'You do not have access to this store.');
            }

            // Fallback: logout
            auth()->guard('admin')->logout();
            return redirect()->route('admin.session.create')
                ->with('error', 'Unauthorized access to this store.');
        }

        // Set current channel in session for easy access
        session(['current_channel_id' => $currentChannel->id]);
        
        // Share with views
        view()->share('currentChannel', $currentChannel);

        return $next($request);
    }
}