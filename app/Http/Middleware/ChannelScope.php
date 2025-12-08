<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Webkul\User\Models\Admin;

class ChannelScope
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
        $admin = Auth::guard('admin')->user();

        if ($admin && ! $admin->isSuperAdmin()) {
            // Set the channel context for the application
            config(['app.scoped_channel_id' => $admin->channel_id]);
        }

        return $next($request);
    }
}
