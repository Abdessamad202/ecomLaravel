<?php
namespace App\Http\Middleware;

// use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        // If the request expects a JSON response, return null
        if (!$request->expectsJson()) {
            return route('login'); // Redirect to the login route
        }
    }
}
