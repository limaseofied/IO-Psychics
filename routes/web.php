<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\SuperAdminForgotPasswordController;
use App\Http\Controllers\Admin\HoroscopeSignController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Api\HoroscopeController;

// -------------------
// ADMIN (Super Admin)
// -------------------
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.submit');

     Route::get('forgot-password', [SuperAdminForgotPasswordController::class, 'show'])
        ->name('password.forgot');

    Route::post('forgot-password', [SuperAdminForgotPasswordController::class, 'sendOtp'])
        ->name('password.sendOtp');

    Route::post('verify-otp', [SuperAdminForgotPasswordController::class, 'verifyOtp'])
        ->name('password.verifyOtp');

    Route::get('reset-password', [SuperAdminForgotPasswordController::class, 'resetForm'])
        ->name('password.reset.form');

    Route::post('reset-password', [SuperAdminForgotPasswordController::class, 'reset'])
        ->name('password.reset');


    Route::middleware(['admin.auth', 'auto.logout'])->group(function () {       

            Route::get('dashboard', [AdminLoginController::class, 'index'])->name('dashboard');
            Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
            Route::get('profile/edit', [ProfileController::class, 'edit'])
            ->name('profile.edit');

            Route::post('profile/update', [ProfileController::class, 'update'])
            ->name('profile.update');

            // Show change password form
            Route::get('profile/change-password', [ProfileController::class, 'changePasswordForm'])
            ->name('profile.changepassword');

            // Handle form submission
            Route::post('profile/change-password', [ProfileController::class, 'updatePassword'])
            ->name('profile.updatePassword');

            Route::get('horoscope-signs', [HoroscopeSignController::class, 'index'])->name('signs.index');

            Route::get('horoscope-signs/create', [HoroscopeSignController::class, 'create'])->name('signs.create');

            Route::post('horoscope-signs/store', [HoroscopeSignController::class, 'store'])->name('signs.store');

            Route::get('horoscope-signs/edit/{id}', [HoroscopeSignController::class, 'edit'])->name('signs.edit');

            Route::post('horoscope-signs/update/{id}', [HoroscopeSignController::class, 'update'])->name('signs.update');

            Route::delete('horoscope-signs/{id}', [HoroscopeSignController::class,'delete'])->name('signs.destroy');



    
    });
});


// -------------------
// WEBSITE FRONT
// -------------------

Route::get('/', [HomeController::class, 'index'])->name('home');



//////// CRON JOB FOR HOROSCOPE API

Route::get('horoscope', [HoroscopeController::class,'handle']);
