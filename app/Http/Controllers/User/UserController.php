<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function userDashboard(){
        return view('user.index');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.profile', compact('profileData'));
    }

    public function userProfileEdit()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.edit_profile', compact('profileData'));
    }

    public function userProfileSave(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->education = $request->education;
        $data->position = $request->position;
        $data->employer = $request->employer;
        $data->short_bio = $request->short_bio;
        $data->country = $request->country;
        $data->phone = $request->phone;

        $data->country_code = $request->input('country_code');


        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('uploads/user_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/user_images'), $filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);;
    }

    public function userChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.change_password', compact('profileData'));
    }

    public function userPasswordUpdate(Request $request)
    {
        
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed'
        ]);

        if (!Hash::check($request->old_password, auth::user()->password)) {

            $notification = array(
                'message' => 'Old Password Did Not Match',
                'alert-type' => 'error'
            );

            return back()->with($notification);
        }

        

        //update password
        User::whereId(auth::user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        );
        return back()->with($notification);
    }
}
