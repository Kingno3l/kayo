<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserManagementController extends Controller
{
    public function allUsers()
    {
        // Fetch all users where role is 'user'
        $allUser = User::where('role', 'user')->latest()->get();

        // Define a map of countries to ISO codes
        $countryCodes = [
            'Algeria' => 'DZ',
            'Angola' => 'AO',
            'Benin' => 'BJ',
            'Botswana' => 'BW',
            'Burkina Faso' => 'BF',
            'Burundi' => 'BI',
            'Cabo Verde' => 'CV',
            'Cameroon' => 'CM',
            'Central African Republic' => 'CF',
            'Chad' => 'TD',
            'Comoros' => 'KM',
            'Congo, Democratic Republic of the' => 'CD',
            'Congo, Republic of the' => 'CG',
            'Djibouti' => 'DJ',
            'Egypt' => 'EG',
            'Equatorial Guinea' => 'GQ',
            'Eritrea' => 'ER',
            'Eswatini' => 'SZ',
            'Ethiopia' => 'ET',
            'Gabon' => 'GA',
            'Gambia' => 'GM',
            'Ghana' => 'GH',
            'Guinea' => 'GN',
            'Guinea-Bissau' => 'GW',
            'Ivory Coast' => 'CI',
            'Kenya' => 'KE',
            'Lesotho' => 'LS',
            'Liberia' => 'LR',
            'Libya' => 'LY',
            'Madagascar' => 'MG',
            'Malawi' => 'MW',
            'Mali' => 'ML',
            'Mauritania' => 'MR',
            'Mauritius' => 'MU',
            'Morocco' => 'MA',
            'Mozambique' => 'MZ',
            'Namibia' => 'NA',
            'Niger' => 'NE',
            'Nigeria' => 'NG',
            'Rwanda' => 'RW',
            'Sao Tome and Principe' => 'ST',
            'Senegal' => 'SN',
            'Seychelles' => 'SC',
            'Sierra Leone' => 'SL',
            'Somalia' => 'SO',
            'South Africa' => 'ZA',
            'South Sudan' => 'SS',
            'Sudan' => 'SD',
            'Togo' => 'TG',
            'Tunisia' => 'TN',
            'Uganda' => 'UG',
            'United Republic of Tanzania' => 'TZ',
            'Zambia' => 'ZM',
            'Zimbabwe' => 'ZW',
        ];

        // Pass the $allUser and $countryCodes to the view
        return view('admin.user.all_user', compact('allUser', 'countryCodes'));
    }


    public function updateUserStatus(Request $request)
    {
        $userId = $request->input('user_id');
        $isChecked = $request->input('is_checked', 0);

        // Find the user
        $user = User::find($userId);

        if ($user) {
            $user->status = $isChecked;
            $user->save();

            // Success notification
            $notification = [
                'message' => 'User status updated successfully!',
                'alert-type' => 'success'
            ];
        } else {
            // Error notification if user not found
            $notification = [
                'message' => 'User not found!',
                'alert-type' => 'error'
            ];
        }

        // Return the notification as JSON response
        return response()->json($notification);
    }

}
