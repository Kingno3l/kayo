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
use App\Mail\RegistrationConfirmationMail;




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
    //         'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
    //         'password' => ['required', 'confirmed', Rules\Password::defaults()],
    //     ]);

    //     $user = User::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //     ]);

    //     event(new Registered($user));

    //     Auth::login($user);

    //     // Redirect with success message
    //     $notification = array(
    //         'message' => 'Registration Completed!',
    //         'alert-type' => 'success'
    //     );

    //     return Redirect()->route('dashboard')->with($notification);

    //     // return redirect(route('dashboard', absolute: false));
    // }


    public function store(Request $request): RedirectResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        // Check if the email already exists and has a verification token
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser && $existingUser->email_verification_token) {
            $notification = array(
                'message' => 'This email address is already registered. Please check your inbox or spam folder for an email to complete your registration.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

        // Create user with a new verification token
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => null, // Password will be set later
            'email_verification_token' => Str::random(60), // Generate a unique token
        ]);

        // Send confirmation email with the token
        Mail::to($user->email)->send(new RegistrationConfirmationMail($user));

        $notification = array(
            'message' => 'A confirmation email to help you continue your registration has been sent. Please check your email.',
            'alert-type' => 'success'
        );
        return redirect()->route('emails.email_sent_for_password');
    }

    public function confirmRegistration($token)
    {
        $user = User::where('email_verification_token', $token)->firstOrFail();

        // If the token is valid, show the form to set the password
        return view('authentication.set_password', compact('user'));
    }

    public function completeRegistration(Request $request, $token)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::where('email_verification_token', $token)->firstOrFail();
        $user->update([
            'password' => Hash::make($request->password),
            'email_verification_token' => null, // Clear the token after successful confirmation
        ]);

        Auth::login($user);

        $notification = array(
            'message' => 'Your registration is complete!',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

}
