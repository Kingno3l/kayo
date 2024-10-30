<?php

namespace App\Http\Middleware\User;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class CheckUserProfile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Check if the user has completed the required profile fields
            $isProfileComplete = !empty($user->country) && !empty($user->phone);

            // If the user has completed their profile, and they're trying to access the profile completion page, redirect to the dashboard
            if ($isProfileComplete && $request->route()->named('profile.complete')) {
                return redirect()->route('dashboard');
            }

            // If the user hasn't completed their profile and they're not on the profile completion page, redirect them there
            if (!$isProfileComplete && !$request->route()->named('profile.complete')) {
                return redirect()->route('profile.complete');
            }
        }

        return $next($request);
    }
}
