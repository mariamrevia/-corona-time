<?php

use App\Http\Controllers\Auth\AuthController;
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
