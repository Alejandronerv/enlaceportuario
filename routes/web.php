<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
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
// LOGIN ROUTES****************************************
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'validateLogin'])->name('login');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// *****************************************************

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

// SEND EMAIL TEST
Route::get('/send-email-recovery', [MailController::class, 'sendEmailRecoveryProcess'])->name('send-email-recovery');

// API RESTFUL
Route::get('/apitest', [PostController::class, 'apiTest'])->name('apitest');