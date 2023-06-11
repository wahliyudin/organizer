<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!auth()->check())
            return to_route('login');

        $user = auth()->user();

        foreach ($roles as $role) {
            if ($user->role?->value == $role) {
                return $next($request);
            }
        }

        return to_route('login');
    }
}
