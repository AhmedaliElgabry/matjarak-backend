<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')
                ->group(base_path('routes/super-admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'super_admin' => \App\Http\Middleware\SuperAdmin::class,
            'validate_tenant' => \App\Http\Middleware\ValidateTenantAccess::class,
            'seller_only' => \App\Http\Middleware\SellerOnly::class,
        ]);

        // Apply tenant validation to ALL admin routes
        $middleware->group('admin', [
            'web',
            'admin',
            'validate_tenant', // CRITICAL: Validates tenant access
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();