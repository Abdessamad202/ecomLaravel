<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        // Trust hosts
        // \App\Http\Middleware\TrustHosts::class,
        // Proxies
        // \App\Http\Middleware\TrustProxies::class,
        // Handle CORS
        \Illuminate\Http\Middleware\HandleCors::class,
        // Prevent requests during maintenance
        // \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        // CSRF token validation
        \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
        // Session management
        \Illuminate\Session\Middleware\StartSession::class,
        // Share errors from session to views
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            // \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            // \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
    ];
}

