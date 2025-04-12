<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php', // Make sure this line exists
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Add the API middleware stack
        $middleware->api([
            \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            \Illuminate\Routing\Middleware\ThrottleRequests::class.':api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ]);

      //  Register your middleware aliases
        $middleware->alias([
            'isAdmin' => \App\Middleware\IsAdmin::class,
            'isManager' => \App\Middleware\IsManager::class,
            'isEmployee' => \App\Middleware\IsEmployee::class,
        ]);


    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
