<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('authentication.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    // public function store(LoginRequest $request): RedirectResponse
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     $url = '';

    //     if ($request->user()->role === 'admin') {
    //         $url = 'admin/dashboard';
    //     } else if ($request->user()->role === 'user') {
    //         $url = 'dashboard';
    //     }

    //     // Notification for success login
    //     $notification = array(
    //         'message' => 'Login Successful!',
    //         'alert-type' => 'success'
    //     );

    //     // Redirect to intended URL with notification
    //     return redirect()->intended($url)->with($notification);
    // }

    public function store(LoginRequest $request): RedirectResponse
    {
        // Authenticate the user
        $request->authenticate();

        // Regenerate the session
        $request->session()->regenerate();

        // Determine the redirect URL
        $url = '';

        // Check if the user's profile is completed
        if (!$request->user()->profile_completed) {
            // Redirect to profile completion if not completed
            return redirect()->route('profile.complete')->with([
                'message' => 'Please complete your profile before accessing the dashboard.',
                'alert-type' => 'info'
            ]);
        }

        // Redirect based on user role
        if ($request->user()->role === 'admin') {
            $url = 'admin/dashboard';
        } else if ($request->user()->role === 'user') {
            $url = 'dashboard';
        }

        // Notification for successful login
        $notification = array(
            'message' => 'Login Successful!',
            'alert-type' => 'success'
        );

        // Redirect to intended URL with notification
        return redirect()->intended($url)->with($notification);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

















// <?php

// namespace App\Http\Controllers\Auth;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Auth\LoginRequest;
// use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\View\View;

// class AuthenticatedSessionController extends Controller
// {
//     /**
//      * Display the login view.
//      */
//     public function create(): View
//     {
//         return view('auth.login');
//     }

//     /**
//      * Handle an incoming authentication request.
//      */
//     public function store(LoginRequest $request): RedirectResponse
//     {
//         $request->authenticate();

//         $request->session()->regenerate();

//         $url = '';

//         if($request->user()->role === 'admin'){
//             return redirect('admin/dashboard');
//         }

//         return redirect()->intended(route('dashboard'));
//     }

//     /**
//      * Destroy an authenticated session.
//      */
//     public function destroy(Request $request): RedirectResponse
//     {
//         Auth::guard('web')->logout();

//         $request->session()->invalidate();

//         $request->session()->regenerateToken();

//         return redirect('/');
//     }
// }
