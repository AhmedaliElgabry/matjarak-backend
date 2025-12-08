<?php

namespace App\Models;

use Webkul\Core\Models\Channel as BaseChannel;
use App\Services\TenantService;

class Channel extends BaseChannel
{
    /**
     * Boot the model
     */
    protected static function boot()
    {
        parent::boot();

        // Clear cache when channel is updated
        static::updated(function ($channel) {
            TenantService::clearChannelCache($channel->hostname);
        });

        static::deleted(function ($channel) {
            TenantService::clearChannelCache($channel->hostname);
        });
    }
}