<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

/**
 * Simple Channel Isolation Middleware
 * 
 * This middleware ensures:
 * 1. Sellers can only access their assigned channel
 * 2. Super admins can access all channels
 * 3. Sellers cannot switch channels
 */
class EnforceChannelAccess
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->guard('admin')->user();

        // Skip if not authenticated
        if (!$user) {
            return $next($request);
        }

        // Super admins can do everything - no restrictions
        if ($user->role === 'super_admin') {
            return $next($request);
        }

        // For sellers (non-super admins)
        if ($user->channel_id) {
            // Force their channel in session
            session()->put('channel', $user->channel_id);
            
            // Remove any channel_id from request to prevent switching
            if ($request->has('channel_id')) {
                $request->request->remove('channel_id');
            }
            
            if ($request->has('channel')) {
                $request->request->remove('channel');
            }
        }

        return $next($request);
    }
}