<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\RegistrationWithPasswordMail;




class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('authentication.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
   


    // public function store(Request $request): RedirectResponse
    // {
    //     $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255'],
    //     ]);

    //     // Check if the email already exists and has a verification token
    //     $existingUser = User::where('email', $request->email)->first();

    //     if ($existingUser && $existingUser->email_verification_token) {
    //         $notification = array(
    //             'message' => 'This email address is already registered. Please check your inbox or spam folder for an email to complete your registration.',
    //             'alert-type' => 'error'
    //         );
    //         return redirect()->back()->with($notification);
    //     }

    //     // Generate a random password
    //     $randomPassword = Str::random(10); // You can adjust the length or complexity

    //     // Create user with a hashed password
    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($randomPassword), // Save hashed password
    //         'email_verification_token' => null, // No verification token needed
    //     ]);

    //     // Send email with the random password
    //     Mail::to($user->email)->send(new RegistrationWithPasswordMail($user, $randomPassword));

    //     $notification = array(
    //         'message' => 'Your account has been created. Please check your email for your login credentials.',
    //         'alert-type' => 'success'
    //     );
    //     return redirect()->route('emails.email_sent_for_password');
    // }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // Check if the email already exists
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            $notification = [
                'message' => 'This email address is already registered. Please log in or use the password reset option if you forgot your password.',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        // Generate a random password
        $randomPassword = Str::random(10);

        // Create the user with a hashed password
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($randomPassword),
        ]);

        // Send email with the random password
        Mail::to($user->email)->send(new RegistrationWithPasswordMail($user, $randomPassword));

        $notification = [
            'message' => 'Your account has been created. Please check your email for your login credentials.',
            'alert-type' => 'success'
        ];
        return redirect()->route('emails.email_sent_for_password')->with($notification);
    }



}
