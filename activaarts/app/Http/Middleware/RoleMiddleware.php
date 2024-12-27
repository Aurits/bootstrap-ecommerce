<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || Auth::user()->roles !== $role) {
            // Redirect or abort if the user does not have the required role
            return redirect("/");
            // return abort(403, 'Unauthorized');
        }
        return $next($request);
    }
}
