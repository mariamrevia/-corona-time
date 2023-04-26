<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\StatisticController;
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
Route::post('/languages/{locale}', [LanguageController::class, 'langSwitch'])->name('languages.switch');
Route::view('/', 'login')->name('login.show');
Route::view('register', 'register')->name('register.show');
Route::controller(AuthController::class)->group(function () {
	Route::post('login', 'login')->name('login');
	Route::post('register', 'register')->name('register');
});

Route::prefix('dashboard')->controller(StatisticController::class)->middleware(['auth', 'verified'])->group(function () {
	Route::get('worldwide', 'showWorldwide')->name('worldwide.show');
	Route::get('byCountry', 'showStatistics')->name('statistics.show');
});

Route::view('/email/verify', 'email.confirm')->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::view('congrats', 'email.congrats')->name('congrats.show');

Route::view('reset/passw', 'email.verify')->name('verify.show');
Route::view('confirm', 'email.confirm')->name('confirm.show');
Route::controller(PasswordResetController::class)->middleware('guest')->group(function () {
	Route::post('/forgot-password', 'notify')->name('password.email');
	Route::get('/reset-password/{token}', 'showResetForm')->name('password.reset');
	Route::post('/reset-password', 'update')->name('password.update');
});
