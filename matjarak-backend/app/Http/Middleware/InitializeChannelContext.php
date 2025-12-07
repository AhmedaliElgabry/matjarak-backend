<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Services\ChannelContext;
use App\Services\TenantService;

class InitializeChannelContext
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // 1. Initialize channel context
        ChannelContext::initialize();

        $admin = Auth::guard('admin')->user();

        // Allow guests (e.g., login page) to proceed
        if (!$admin) {
            return $next($request);
        }

        // 2. Identify the store from the URL
        $currentChannel = TenantService::getCurrentChannel();

        if (!$currentChannel) {
            abort(404, 'Store not found for this domain.');
        }

        // 3. CRITICAL: Enforce Tenant Isolation
        $isSuperAdmin = $admin->channel_id === null;

        if (!$isSuperAdmin && $admin->channel_id !== $currentChannel->id) {
            
            // A. Log the event
            Log::warning('Cross-tenant access blocked', [
                'email' => $admin->email,
                'target_store' => $currentChannel->code
            ]);

            // B. STRICT LOGOUT (No Cross-Domain Redirects)
            // This prevents the infinite loop and session corruption.
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // C. Return to the Login Page on THIS domain
            return redirect()->route('admin.session.create')
                ->withErrors(['error' => 'Access Denied: You cannot manage this store with your account.']);
        }

        // 4. Share channel info with views
        view()->share('currentTenantChannel', $currentChannel);

        return $next($request);
    }
}