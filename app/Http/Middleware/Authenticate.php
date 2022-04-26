<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware {
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function handle($request, Closure $next) {
        if (! $request->expectsJson()) {
            if (auth()->user()) {
                return $next($request);
            } else {
                return redirect('auth/login');
            }
        }
    }
}
