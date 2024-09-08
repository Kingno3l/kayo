<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // $role = Auth::user()->role();

        $user = Auth::user();

        if ($user->role == 'user') {
            return $next($request);
        }

        if ($user->role == 'admin') {
            return redirect()->route('admin.admin_dashboard');
        }

       
    }
}
