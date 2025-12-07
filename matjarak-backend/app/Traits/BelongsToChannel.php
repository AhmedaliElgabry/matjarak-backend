<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait BelongsToChannel
{
    /**
     * Boot the trait - add global scope
     */
    protected static function bootBelongsToChannel()
    {
        // Automatically filter queries by channel
        static::addGlobalScope('channel', function (Builder $builder) {
            $admin = auth()->guard('admin')->user();
            
            // Super admins see everything
            if (!$admin || $admin->channel_id === null) {
                return;
            }

            // Seller admins only see their channel's data
            $channelId = session('current_channel_id', $admin->channel_id);
            
            // Check if this model has direct channel_id
            if (in_array('channel_id', $builder->getModel()->getFillable())) {
                $builder->where($builder->getModel()->getTable() . '.channel_id', $channelId);
            } 
            // Check if it's a many-to-many via pivot table
            elseif (method_exists($builder->getModel(), 'channels')) {
                $builder->whereHas('channels', function ($query) use ($channelId) {
                    $query->where('channels.id', $channelId);
                });
            }
        });
    }

    /**
     * Scope to get data for specific channel
     */
    public function scopeForChannel(Builder $query, $channelId)
    {
        return $query->withoutGlobalScope('channel')
            ->whereHas('channels', function ($q) use ($channelId) {
                $q->where('channels.id', $channelId);
            });
    }

    /**
     * Scope to get all data (bypass scope)
     */
    public function scopeAllChannels(Builder $query)
    {
        return $query->withoutGlobalScope('channel');
    }
}