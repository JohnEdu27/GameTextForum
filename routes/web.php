<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GamerController;
use App\Http\Controllers\GrandmasterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'displayWelcome']);
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'displayRegister'])->name('registerPage');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::get('/login', [AuthController::class, 'displayLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');

    Route::get('/forgotpassword', [AuthController::class, 'displayForgotPass'])->name('password.request');
    Route::post('/forgotpassword', [AuthController::class, 'forgotPass'])->name('password.email')->middleware('throttle:5,1');
    Route::get('/reset-password/{token}', [AuthController::class, 'displayResetPass'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'resetPass'])->name('password.update');
});

Route::get('/email/verify', fn () => view('Account.verify-email'))
    ->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('homepage')->with('status', 'email-verified');
})->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('homepage');
    }

    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::middleware(['auth', 'verified'])->group(function () {
    if(Auth::user('auth')) {
        Route::get('/', fn () => redirect()->route('homepage'));
        Route::get('/login', fn () => redirect()->route('homepage'));
        Route::get('/register', fn () => redirect()->route('homepage'));
    }
    
    Route::get('/homepage', [GamerController::class, 'homepage'])->name('homepage');
    Route::post('/save-sort', [GamerController::class, 'saveSortPreference'])->name('saveSort');
    });

Route::middleware(['auth', 'role:grandmaster', 'verified'])->group(function() {

    Route::get('/grandmaster', [GrandmasterController::class, 'index'])->name('grandmaster.dashboard');
});

