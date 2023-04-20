<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\VerificationController;
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
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::view('register', 'register')->name('register.show');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::view('confirm', 'email.confirm')->name('email.confirm');
Route::view('congrats', 'email.congrats')->name('email.congrats');

Route::view('/email/verify', 'email.confirm')->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
