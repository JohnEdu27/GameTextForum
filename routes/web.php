<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\GamerController;
use App\Http\Cpmtrollers\GrandmasterController;
use Illuminate\Support\Facades\Route;



Route::middleware('guest')->group(function() {

    Route::get('/', function() {
        return view('welcome');

    });
    
    Route::get('/register', [authController::class, 'displayRegister'])->name('registerPage');
    Route::post('/register', [authController::class, 'register'])->name('register.submit');
    Route::get('/login', [authController::class, 'displayLogin'])->name('loginPage');
    Route::post('/login',[authController::class, 'login'])->name('login.submit')->middleware('throttle:5,1');

    Route::get('/forgotpassword', [authController::class, 'displayforgotpass'])->name('forgotpassPage');
    Route::post('/forgotpassword', [authController::class, 'forgotpass'])->name('forgotpass');

});




Route::middleware('auth')->group(function() {
    Route::get('/homepage', function() {
        return view('layouts.gaming');
    });
    Route::post('/logout', [authController::class, 'logout'])->name('logout');

    Route::post('/save-sort', [GamerController::class, 'saveSortPreference'])->name('saveSort');
});