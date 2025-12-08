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
            Route::middleware('web')->group(base_path('routes/super-admin.php'));
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Register Aliases
        $middleware->alias([
            'super_admin' => \App\Http\Middleware\SuperAdmin::class,
            'initialize_channel' => \App\Http\Middleware\InitializeChannelContext::class,
        ]);

        // Add the EnforceChannelAccess middleware to the 'admin' group
        // This ensures it runs for all admin routes
        $middleware->appendToGroup('admin', [
            'initialize_channel',
            \App\Http\Middleware\EnforceChannelAccess::class, // <--- ADDED THIS LINE
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();