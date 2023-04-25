<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\EmailVerificationController;
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

Route::view('/', 'login')->name('login.show');
Route::view('register', 'register')->name('register.show');
Route::controller(AuthController::class)->group(function () {
	Route::post('login', 'login')->name('login');
	Route::post('register', 'register')->name('register');
});

Route::view('dashboard/worldwide', 'dashboard.worldwide')->name('worldwide.show')->middleware(['auth', 'verified']);

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
