<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Controller Override Service Provider
 * 
 * This service provider binds custom controllers to override package controllers
 */
class ControllerOverrideServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        // Bind package ProductController to our override
        $this->app->bind(
            \Webkul\Admin\Http\Controllers\Catalog\ProductController::class,
            \App\Http\Controllers\Admin\Catalog\ProductController::class
        );
        
        // You can add more controller bindings here as needed
        // Example:
        // $this->app->bind(
        //     \Webkul\Admin\Http\Controllers\Catalog\CategoryController::class,
        //     \App\Http\Controllers\Admin\Catalog\CategoryController::class
        // );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}