<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Sessions\AuthController;
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

Route::view('/', 'login')->name('login');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::view('register', 'register')->name('register');
Route::post('register', [RegisterController::class, 'store'])->name('register.store');
Route::view('confirm', 'email.confirm')->name('email.confirm');
