<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BackgroundController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ServiceController;
use App\Http\Controllers\Backend\MediaController;
use App\Http\Controllers\Backend\MessageController;
use App\Http\Controllers\Backend\SettingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    return "Cache cleared!";
});

// -------------- AUTHONTICATION ROUTES ------------------
Route::middleware('guest')->group(function(){
    Route::view('login', 'auth.pages.login')->name('login');
    Route::post('login', LoginController::class)->name('login-handler');
    Route::view('password/forgot', 'auth.pages.forgot')->name('forgot');
    Route::post('forgot', ForgotPasswordController::class)->name('forgot-password');
    Route::view('password/reset/{token}', 'auth.pages.reset')->name('reset');
    Route::post('reset', ResetPasswordController::class)->name('reset-password');
});
// Logout Route
Route::post('logout', LogoutController::class)->name('logout')->middleware('auth');


// -------------- FRONTEND ROUTES ------------------
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('home');
    Route::get('/services', 'services')->name('services');
    Route::get('/media', 'media')->name('media');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/sadaka', 'sadaka')->name('sadaka');

    Route::post('/send-message', 'sendMessage')->name('send-message');
});

// -------------- BACKEND ROUTES ------------------

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::prefix("profile")->name("profile.")->controller(ProfileController::class)->group(function (){
        Route::get('/', "index")->name("index");
        Route::post('/', "update")->name("update");
        Route::post('/change-password', "changePassword")->name("change-password");
    });

    Route::resource('services', ServiceController::class);
    
    Route::resource('media', MediaController::class);
    
    Route::prefix('messages')->name('messages.')->controller(MessageController::class)->group(function(){
        Route::get('/', 'index')->name("index");
        Route::get('/{message}/read', 'markAsRead')->name('read');
        Route::post('/read', 'markAllAsRead')->name('read_all');
        Route::delete('/{message}', 'destroy')->name('destroy');
    });
    
    Route::prefix('settings')->name("settings.")->controller(SettingController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/update-settings', 'update_settings')->name('update_settings');
        Route::post('/update-social', 'update_social')->name('update_social');
    });
    
    Route::view('/schedules', "backend.pages.schedules.index")->name("schedules.index");

    Route::prefix('about')->name("about.")->controller(AboutController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::post('/', 'update')->name('update');
    });
    
    Route::prefix('backgrounds')->name("backgrounds.")->controller(BackgroundController::class)->group(function (){
        Route::get('/', 'index')->name('index');
        Route::put('/{background}', 'update')->name('update');
    });

});