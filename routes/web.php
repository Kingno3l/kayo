<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;


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

});

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.admin_dashboard');
});

Route::get('/test-alert', function () {
    return view('test-alert');
});

