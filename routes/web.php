<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\SuperAdminForgotPasswordController;
use App\Http\Controllers\Admin\HoroscopeSignController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Api\HoroscopeController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SpecialityController;
use App\Http\Controllers\Admin\ToolController;
use App\Http\Controllers\Admin\ReadingStyleController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\SubscriptionPlanController;
use App\Http\Controllers\Admin\PayPerSessionPlanController;
use App\Http\Controllers\Admin\GuideController;
use App\Http\Controllers\Admin\HoroscopeDataController;


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


             // Blog Routes (Developed by Lima Mohanty :: 05-Jan-2026)
            Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
            Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
            Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');
            Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
            Route::post('blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
            Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.delete');

            // Category Routes (Developed by Lima Mohanty :: 05-Jan-2026)
            Route::get('category', [CategoryController::class, 'index'])->name('category.index');
            Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
            Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
            Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
            Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
            Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

             Route::get('specialities', [SpecialityController::class, 'index'])->name('specialities.index');
            Route::get('specialities/create', [SpecialityController::class, 'create'])->name('specialities.create');
            Route::post('specialities/store', [SpecialityController::class, 'store'])->name('specialities.store');
            Route::get('specialities/edit/{id}', [SpecialityController::class, 'edit'])->name('specialities.edit');
            Route::post('specialities/update/{id}', [SpecialityController::class, 'update'])->name('specialities.update');
            Route::delete('specialities/{id}', [SpecialityController::class, 'destroy'])->name('specialities.delete');

            Route::get('tools', [ToolController::class, 'index'])->name('tools.index');
            Route::get('tools/create', [ToolController::class, 'create'])->name('tools.create');
            Route::post('tools/store', [ToolController::class, 'store'])->name('tools.store');
            Route::get('tools/edit/{id}', [ToolController::class, 'edit'])->name('tools.edit');
            Route::post('tools/update/{id}', [ToolController::class, 'update'])->name('tools.update');
            Route::delete('tools/{id}', [ToolController::class, 'destroy'])->name('tools.delete');

            Route::get('readingstyles', [ReadingStyleController::class, 'index'])->name('readingstyles.index');
            Route::get('readingstyles/create', [ReadingStyleController::class, 'create'])->name('readingstyles.create');
            Route::post('readingstyles/store', [ReadingStyleController::class, 'store'])->name('readingstyles.store');
            Route::get('readingstyles/edit/{id}', [ReadingStyleController::class, 'edit'])->name('readingstyles.edit');
            Route::post('readingstyles/update/{id}', [ReadingStyleController::class, 'update'])->name('readingstyles.update');
            Route::delete('readingstyles/{id}', [ReadingStyleController::class, 'destroy'])->name('readingstyles.delete');

            Route::get('skills', [SkillController::class, 'index'])->name('skills.index');
            Route::get('skills/create', [SkillController::class, 'create'])->name('skills.create');
            Route::post('skills/store', [SkillController::class, 'store'])->name('skills.store');
            Route::get('skills/edit/{id}', [SkillController::class, 'edit'])->name('skills.edit');
            Route::post('skills/update/{id}', [SkillController::class, 'update'])->name('skills.update');
            Route::delete('skills/{id}', [SkillController::class, 'destroy'])->name('skills.delete');

            Route::get('faq', [FaqController::class, 'index'])->name('faq.index');
            Route::get('faq/create', [FaqController::class, 'create'])->name('faq.create');
            Route::post('faq/store', [FaqController::class, 'store'])->name('faq.store');
            Route::get('faq/edit/{id}', [FaqController::class, 'edit'])->name('faq.edit');
            Route::post('faq/update/{id}', [FaqController::class, 'update'])->name('faq.update');
            Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faq.delete');


            Route::get('subscription', [SubscriptionPlanController::class, 'index'])->name('subscription.index');
            Route::get('subscription/create', [SubscriptionPlanController::class, 'create'])->name('subscription.create');
            Route::post('subscription/store', [SubscriptionPlanController::class, 'store'])->name('subscription.store');
            Route::get('subscription/edit/{id}', [SubscriptionPlanController::class, 'edit'])->name('subscription.edit');
            Route::post('subscription/update/{id}', [SubscriptionPlanController::class, 'update'])->name('subscription.update');
            Route::delete('subscription/{id}', [SubscriptionPlanController::class, 'destroy'])->name('subscription.delete');

            Route::get('pay-per-session', [PayPerSessionPlanController::class, 'index'])->name('pay-per-session.index');
            Route::get('pay-per-session/create', [PayPerSessionPlanController::class, 'create'])->name('pay-per-session.create');
            Route::post('pay-per-session/store', [PayPerSessionPlanController::class, 'store'])->name('pay-per-session.store');
            Route::get('pay-per-session/edit/{id}', [PayPerSessionPlanController::class, 'edit'])->name('pay-per-session.edit');
            Route::post('pay-per-session/update/{id}', [PayPerSessionPlanController::class, 'update'])->name('pay-per-session.update');
            Route::delete('pay-per-session/{id}', [PayPerSessionPlanController::class, 'destroy'])->name('pay-per-session.delete');


            Route::get('guides', [GuideController::class, 'index'])->name('guides.index');
            Route::get('guides/create', [GuideController::class, 'create'])->name('guides.create');
            Route::post('guides/store', [GuideController::class, 'store'])->name('guides.store');
            Route::get('guides/edit/{id}', [GuideController::class, 'edit'])->name('guides.edit');
            Route::post('guides/update/{id}', [GuideController::class, 'update'])->name('guides.update');
            Route::delete('guides/{id}', [GuideController::class, 'destroy'])->name('guides.delete');

            // Daily Horoscope
            Route::get('/daily-horoscope', [HoroscopeDataController::class, 'dailyIndex'])->name('daily.index');
        
            // Monthly Horoscope
            Route::get('/monthly-horoscope', [HoroscopeDataController::class, 'monthlyIndex'])->name('monthly.index');
});

});


// -------------------
// WEBSITE FRONT
// -------------------

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/plans-pricing', [HomeController::class, 'plans'])->name('plans');
Route::get('/guides', [HomeController::class, 'guides'])->name('guides'); //connect-tarot-guides redirects to guide list pages with filter raeading style tarot selected
Route::get('/horoscopes', [HomeController::class, 'horoscopes'])->name('horoscopes');
Route::get('/tarot', [HomeController::class, 'tarot'])->name('tarot');
Route::get('/topics', [HomeController::class, 'topics'])->name('topics');
Route::get('/how-it-works', [HomeController::class, 'howItWorks'])->name('how.it.works');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
// Free Trial
Route::get('/free-trial', [HomeController::class, 'freeTrial'])->name('free.trial');
// Auth Pages
Route::get('/signup', [HomeController::class, 'signup'])->name('signup');
Route::get('/login', [HomeController::class, 'login'])->name('login');

//////// CRON JOB FOR HOROSCOPE API

Route::get('horoscope', [HoroscopeController::class,'handle']);
