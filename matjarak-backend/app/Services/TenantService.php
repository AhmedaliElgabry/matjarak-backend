<?php

namespace App\Services;

use Webkul\Core\Models\Channel;
use Illuminate\Support\Facades\Cache;

class TenantService
{
    /**
     * Get channel by hostname with caching
     */
    public static function getChannelByHostname($hostname)
    {
        return Cache::remember("channel:hostname:{$hostname}", 3600, function () use ($hostname) {
            return Channel::where('hostname', $hostname)->first();
        });
    }

    /**
     * Get current channel from request
     */
    public static function getCurrentChannel()
    {
        $hostname = request()->getHost();
        $port = request()->getPort();
        
        // Build full hostname with port if not 80/443
        if (!in_array($port, [80, 443])) {
            $hostname = $hostname . ':' . $port;
        }
        
        return self::getChannelByHostname($hostname);
    }

    /**
     * Check if admin can access channel
     */
    public static function canAdminAccessChannel($admin, $channel)
    {
        // Super admin (channel_id = null) can access all
        if ($admin->channel_id === null) {
            return true;
        }

        // Seller admin can only access their own channel
        return $admin->channel_id === $channel->id;
    }

    /**
     * Clear channel cache
     */
    public static function clearChannelCache($hostname = null)
    {
        if ($hostname) {
            Cache::forget("channel:hostname:{$hostname}");
        } else {
            Cache::flush(); // Or use tags if available
        }
    }
}