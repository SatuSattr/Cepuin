<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * Usage: ->middleware('role:admin') or 'role:admin,student' or 'role:admin|student'
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403);
        }

        $roles = collect($roles)
            ->flatMap(fn ($r) => explode('|', (string) $r))
            ->map(fn ($r) => strtolower(trim($r)))
            ->filter()
            ->values();

        if ($roles->isEmpty()) {
            return $next($request);
        }

        if (! $roles->contains(strtolower((string) $user->role))) {
            abort(403, 'This action is unauthorized.');
        }

        return $next($request);
    }
}

