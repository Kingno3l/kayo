<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;



class UserFinanciesController extends Controller
{
    public function annualPaidUsers()
    {
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Fetch users who have paid for the current year
        $users = User::whereHas('payments', function ($query) use ($currentYear) {
            $query->whereYear('created_at', $currentYear);
        })->get();

        // Define a map of countries to ISO codes
        $countryCodes = config('country_codes');

        // Pass the $allUser and $countryCodes to the view
        return view('admin.user.annual_paid_users', compact('users', 'countryCodes'));
    }

    public function annualUnpaidUsers()
    {
        // Get the current year
        // Get the current year
        $currentYear = Carbon::now()->year;

        // Fetch users who have not paid for the current year
        $users = User::whereDoesntHave('payments', function ($query) use ($currentYear) {
            $query->whereYear('created_at', $currentYear);
        })->get();

        // Define a map of countries to ISO codes
        $countryCodes = config('country_codes');

        // Pass the $allUser and $countryCodes to the view
        return view('admin.user.annual_unpaid_users', compact('users', 'countryCodes'));
    }
}
