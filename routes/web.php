<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\InventoryYardFileController;
use App\Http\Controllers\ApiAuthController;


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

// DASHBOARD
Route::get('/dashboard', [AnnouncementController::class, 'list'])->name('dashboard')->middleware('auth');


// EMAIL RECOVERY
Route::get('/send-email-recovery', [MailController::class, 'sendEmailRecoveryProcess'])->name('send-email-recovery');

// API RESTFUL
    Route::get('/apitest', [PostController::class, 'apiTest'])->name('apitest');
    Route::get('/autorizo', [ApiAuthController::class, 'apiAuth'])->name('autorizo');
    Route::get('/berth.table', [ApiAuthController::class, 'operationBerth'])->name('berth.table');

// ANNOUNCEMENTS
    
    //  FORM
    Route::get('/announcements.create', function () {
        return view('announcements.create');
    })->name('announcements.create')->middleware('auth');
    
    // SAVE
    Route::post('/announcement.save', [AnnouncementController::class, 'save'])->name('announcement.save')->middleware('auth');;

    // ANNOUNCEMENTS LIST   
    Route::get('/announcements.table', [AnnouncementController::class, 'table'])->name('announcements.table')->middleware('auth');;


    // SINGLE POST
    Route::get('/announcements.post', [AnnouncementController::class, 'show'])->name('announcements.post')->middleware('auth');;


// INVENTORY YARD
    //  FORM
    Route::get('/yardinventory.form', function () {
        return view('yardinventory.form');
    })->name('yardinventory.form')->middleware('auth');;

    // SAVE
    Route::post('/yardinventory.save', [InventoryYardFileController::class, 'save'])->name('yardinventory.save')->middleware('auth');;

    // LIST   
    Route::get('/yardinventory.table', [InventoryYardFileController::class, 'table'])->name('yardinventory.table')->middleware('auth');;

// CONTAINER OPERATION INFORMATION

    //  SEARCH FORM
    Route::get('/container-info.form', function () {
        return view('container-info.form');
    })->name('container-info.form');

    Route::post('/container-info.search', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.search');
    
    
    Route::get('/container-info.table', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.table');

// VESSEL OPERATION SUMMARY

    Route::get('/vessel-operation-summary.table', [ApiAuthController::class, 'vesselOperationSummary'])->name('vessel-operation-summary.table');

