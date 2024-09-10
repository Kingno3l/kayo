<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileManagementController extends Controller
{
    public function profileManagement(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.manage_profile', compact('profileData'));
    }
}
