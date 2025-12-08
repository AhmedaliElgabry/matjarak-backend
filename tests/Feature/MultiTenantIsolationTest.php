<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Order;
use App\Models\Customer;
use Webkul\User\Models\Admin;
use App\Services\ChannelContext;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultiTenantIsolationTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        ChannelContext::reset();
    }

    /** @test */
    public function seller_only_sees_own_products()
    {
        $seller1 = Admin::where('channel_id', 2)->first();
        $this->actingAs($seller1, 'admin');
        ChannelContext::initialize();

        $products = Product::all();
        
        foreach ($products as $product) {
            $channelIds = $product->channels->pluck('id')->toArray();
            $this->assertContains(2, $channelIds, "Product {$product->id} not in channel 2");
        }
    }

    /** @test */
    public function seller_only_sees_own_orders()
    {
        $seller1 = Admin::where('channel_id', 2)->first();
        $this->actingAs($seller1, 'admin');
        ChannelContext::initialize();

        $orders = Order::all();
        
        foreach ($orders as $order) {
            $this->assertEquals(2, $order->channel_id, "Order {$order->id} not in channel 2");
        }
    }

    /** @test */
    public function super_admin_sees_all_data()
    {
        $superAdmin = Admin::whereNull('channel_id')->first();
        $this->actingAs($superAdmin, 'admin');
        ChannelContext::initialize();

        $allProducts = Product::allChannels()->count();
        $filteredProducts = Product::count();

        $this->assertEquals($allProducts, $filteredProducts, "Super admin should see all products");
    }
}