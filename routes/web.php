<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\UserFinanciesController;
use App\Http\Controllers\Admin\MembersController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\User\ProfileManagementController;


Route::get('/', function () {
    return redirect()->route('login');
});


Route::get('/test', function () {
    return view('test');
});

Route::get('/confirm-email', function () {
    return view('emails.email_sent_for_password');
})->name('emails.email_sent_for_password');



// Route::get('/dashboard', function () {
//     return view('user.user_dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Route::get('registration/confirm/{token}', [RegisteredUserController::class, 'confirmRegistration'])->name('registration.confirm');

Route::post('registration/complete/{token}', [RegisteredUserController::class, 'completeRegistration'])->name('registration.complete');



Route::middleware(['auth', 'verified', 'check.status', 'user'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'userDashboard'])->name('dashboard');

    Route::get('/profile', [UserController::class, 'userProfile'])->name('user.profile');

    Route::get('/profile/edit', [UserController::class, 'userProfileEdit'])->name('user.profile.edit');

    Route::post('/profile/save', [UserController::class, 'userProfileSave'])->name('user.profile.update');

    Route::get('/user/logout', [UserController::class, 'userLogout'])->name('user.logout');

    Route::get('/user/change/password', [UserController::class, 'userChangePassword'])->name('user.change.password');

    Route::post('/user/password/update', [UserController::class, 'userPasswordUpdate'])->name('user.password.update');



    // Route::get('/users', [UserController::class, 'userChangePassword'])->name('user.change.password');


    //Personal Details All Routes...
    Route::controller(ProfileManagementController::class)->group(function () {

        Route::get('/profile-management', 'profileManagement')->name('profile-management');

        Route::post('/profile-management', 'profileManagementStore')->name('profile-management.store');

        Route::get('/profile-management/academic-qualification', 'profileManagementAcademicQualification')->name('profile-management.academic-qualification');

        Route::post('/profile-management/academic-qualification', 'profileManagementAcademicQualificationStore')->name('profile-management.academic-qualification.store');

        Route::get('/profile-management/employment-history', 'profileManagementEmploymentHistory')->name('profile-management.employment-history');

        Route::post('/profile-management/employment-history', 'profileManagementEmploymentHistoryStore')->name('profile-management.employment-history.store');

        Route::get('/profile-management/next-of-kin-and-referee', 'nextOfKinAndReferee')->name('profile-management.next-of-kin-and-referee');

        Route::post('/profile-management/next-of-kin-and-referee', 'nextOfKinAndRefereeStore')->name('profile-management.next-of-kin-and-referee.store');

        Route::get('/profile-management/document-upload', 'documentUpload')->name('profile-management.document-upload');

        Route::post('/profile-management/document-upload', 'documentUploadStore')->name('profile-management.document-upload.store');

        Route::post('/profile-management/socials-store', 'socialsStore')->name('socials.store');

        Route::get('/id-card', 'idCardShow')->name('id-card.show');

        Route::get('/id-card/download', 'idCardDownload')->name('id-card.download');



    });

    //users All Routes...
    Route::controller(PaymentController::class)->group(function () {

        Route::get('/all/users', 'allUsers')->name('all.users');

        Route::post('/update/user/status', 'updateUserStatus')->name('update.user.status');

        Route::get('/pay', 'pay')->name('pay.view');
        Route::post('/pay', 'make_payment')->name('pay');
        Route::get('/pay/callback', 'payment_callback')->name('pay.callback');

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

        Route::get('/all/users/completed-registered-users', 'completedRegisteredUsers')->name('completed.registered.users');

        Route::get('/member/{id}', 'memberDetails')->name('member.details');


    });

    //Members All Routes...
    Route::controller(MembersController::class)->group(function () {

        Route::get('/member/{id}', 'memberDetails')->name('member.details');

        Route::get('/member/{id}/profile', [MembersController::class, 'showProfile'])->name('member.profile');

        // Route for viewing member academic qualifications
        Route::get('/member/{id}/academic-qualifications', [MembersController::class, 'showAcademicQualifications'])->name('member.academic.qualifications');

        // Route for viewing member employment history
        Route::get('/member/{id}/employment-history', [MembersController::class, 'showEmploymentHistory'])->name('member.employment.history');

        // Route for viewing member next of kin and referee information
        Route::get('/member/{id}/next-of-kin', [MembersController::class, 'showNextOfKin'])->name('member.nextofkin.referee');

        // Route for viewing member next of kin and referee information
        Route::get('/member/{id}/other-document', [MembersController::class, 'otherDocument'])->name('member.other.document');


    });

    //users All Routes...
    Route::controller(UserFinanciesController::class)->group(function () {

        Route::get('/users/annual-paid-users', 'annualPaidUsers')->name('annual.paid.users');

        Route::get('/users/annual-unpaid-users', 'annualUnpaidUsers')->name('annual.unpaid.users');


    });


});

//end of admin 


Route::get('/disabled', [UserController::class, 'disabled'])->name('disabled');


