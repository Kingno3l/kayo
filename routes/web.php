<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileManagementController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('user.user_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified', 'user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');

    Route::get('/profile/edit', [UserController::class, 'userProfileEdit'])->name('user.profile.edit');

    Route::post('/profile/save', [UserController::class, 'userProfileSave'])->name('user.profile.update');

    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');
    
    Route::post('/user/password/update', [UserController::class, 'userPasswordUpdate'])->name('user.password.update');
    
    Route::get('/users', [UserController::class, 'userChangePassword'])->name('user.change.password');

    //users All Routes...
    Route::controller(PaymentController::class)->group(function () {

        Route::get('/all/users', 'allUsers')->name('all.users');

        Route::post('/update/user/status', 'updateUserStatus')->name('update.user.status');

        Route::get('/pay', 'pay')->name('pay.view');
        Route::post('/pay', 'make_payment')->name('pay');
        Route::get('/pay/callback', 'payment_callback')->name('pay.callback');

    });


    //Personal Details All Routes...
    Route::controller(ProfileManagementController::class)->group(function () {

        Route::get('/profile-management', 'profileManagement')->name('profile.management');


        

    });
});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    // Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.admin_dashboard');

    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.admin_dashboard');

    Route::get('/admin/profile', [AdminController::class, 'adminProfile'])->name('admin.profile');

    Route::get('/admin/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

    Route::get('admin/profile/edit', [UserController::class, 'adminProfileEdit'])->name('admin.profile.edit');

    Route::post('/admin/profile/save', [AdminController::class, 'adminProfileSave'])->name('admin.profile.save');

    Route::get('/admin/change/password', [AdminController::class, 'adminChangePassword'])->name('admin.change.password');

    Route::post('/admin/password/update', [AdminController::class, 'adminPasswordUpdate'])->name('admin.password.update');

    //users All Routes...
    Route::controller(UserManagementController::class)->group(function () {

        Route::get('/all/users', 'allUsers')->name('all.users');

        Route::post('/update/user/status', 'updateUserStatus')->name('update.user.status');

    });


});

//end of admin 

