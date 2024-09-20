<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and has a status of 0
        if (Auth::check() && Auth::user()->status == 0) {
            // Optionally, you can redirect them or show a custom error page
            return redirect()->route(route: 'disabled'); // Example redirect to a "disabled" page
        }

        return $next($request);    }
}
