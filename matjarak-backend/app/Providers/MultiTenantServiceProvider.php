<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ChannelContext;

class MultiTenantServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        // Override Bagisto's reporting ONLY
        $this->overrideBagistoReporting();
    }

    protected function overrideBagistoReporting(): void
    {
        // Override Sale Reporting
        $this->app->resolving(\Webkul\Admin\Helpers\Reporting\Sale::class, function ($sale) {
            if (!ChannelContext::shouldFilter()) {
                return;
            }

            try {
                $reflection = new \ReflectionClass($sale);
                $property = $reflection->getProperty('channelIds');
                $property->setAccessible(true);
                $property->setValue($sale, ChannelContext::getIds());
            } catch (\Exception $e) {
                \Log::error('Failed to override Sale reporting', ['error' => $e->getMessage()]);
            }
        });

        // Override Product Reporting
        $this->app->resolving(\Webkul\Admin\Helpers\Reporting\Product::class, function ($product) {
            if (!ChannelContext::shouldFilter()) {
                return;
            }

            try {
                $reflection = new \ReflectionClass($product);
                $property = $reflection->getProperty('channelIds');
                $property->setAccessible(true);
                $property->setValue($product, ChannelContext::getIds());
            } catch (\Exception $e) {
                \Log::error('Failed to override Product reporting', ['error' => $e->getMessage()]);
            }
        });

        // Override Customer Reporting
        $this->app->resolving(\Webkul\Admin\Helpers\Reporting\Customer::class, function ($customer) {
            if (!ChannelContext::shouldFilter()) {
                return;
            }

            try {
                $reflection = new \ReflectionClass($customer);
                $property = $reflection->getProperty('channelIds');
                $property->setAccessible(true);
                $property->setValue($customer, ChannelContext::getIds());
            } catch (\Exception $e) {
                \Log::error('Failed to override Customer reporting', ['error' => $e->getMessage()]);
            }
        });
    }

    public function register(): void
    {
        // Model overrides removed - they were breaking the connection
    }
}
