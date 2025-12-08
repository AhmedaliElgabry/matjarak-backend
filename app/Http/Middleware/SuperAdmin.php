<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdmin
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
        // Check if user is authenticated as admin
        if (!Auth::guard('admin')->check()) {
            return redirect()->route('admin.session.create')
                ->with('error', 'Please login to continue.');
        }

        $admin = Auth::guard('admin')->user();

        // Super Admin check: channel_id should be NULL
        if ($admin->channel_id !== null) {
            // Not a super admin - redirect with error
            return redirect()->route('admin.dashboard.index')
                ->with('error', 'Access Denied: This area is restricted to super administrators only.');
        }

        // User is super admin - allow access
        return $next($request);
    }
}
