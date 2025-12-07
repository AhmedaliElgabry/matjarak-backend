<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SellerOnly
{
    /**
     * Only allow seller admins (with channel_id)
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = auth()->guard('admin')->user();

        if (!$admin || $admin->channel_id === null) {
            return redirect()->route('admin.super-admin.index')
                ->with('error', 'This area is only for seller admins.');
        }

        return $next($request);
    }
}