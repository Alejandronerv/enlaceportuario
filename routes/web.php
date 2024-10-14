<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AnnouncementController;
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

Route::get('/dashboard', [AnnouncementController::class, 'list'])->name('dashboard')->middleware('auth');


// EMAIL RECOVERY
Route::get('/send-email-recovery', [MailController::class, 'sendEmailRecoveryProcess'])->name('send-email-recovery');

// API RESTFUL
Route::get('/apitest', [PostController::class, 'apiTest'])->name('apitest');

// ANNOUNCEMENTS
    
    //  FORM
    Route::get('/announcements.create', function () {
        return view('announcements.create');
    })->name('announcements.create');
    
    // SAVE
    Route::post('/announcement.save', [AnnouncementController::class, 'save'])->name('announcement.save');

    // ANNOUNCEMENTS LIST   
    Route::get('/announcements.table', [AnnouncementController::class, 'table'])->name('announcements.table');


    // SINGLE POST
    // Route::get('/announcements.post', function () {
    //     return view('announcements.post');
    // })->name('announcements.post');
    Route::get('/announcements.post', [AnnouncementController::class, 'show'])->name('announcements.post');

