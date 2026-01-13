<?php

namespace App\Http\Middleware;

class RoleMiddleware
{
    public function handle($request, \Closure $next, ...$roles)
    {
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        if (! in_array(auth()->user()->uloga, $roles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
