<?php

namespace App\Models;

use Webkul\Product\Models\Product as BaseProduct;
use App\Traits\BelongsToChannel;

class Product extends BaseProduct
{
    use BelongsToChannel;

    /**
     * Relationship with channels
     */
    public function channels()
    {
        return $this->belongsToMany(
            \Webkul\Core\Models\Channel::class,
            'product_channels',
            'product_id',
            'channel_id'
        );
    }
}