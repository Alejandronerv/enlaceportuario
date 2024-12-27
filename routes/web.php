<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\InventoryYardFileController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ShipAgency;

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

// LOGIN ROUTES
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'validateLogin'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/password-reset', function () {
    return view('password-reset');
})->name('password-reset');

Route::post('/password/reset', [MailController::class, 'saveNewPassword'])->name('password.update');

Route::post('/send-email-recovery', [MailController::class, 'sendEmailRecoveryProcess'])->name('send-email-recovery');

// REGISTRATION ROUTES
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/user/save', [AuthController::class, 'save'])->name('user.save');

// AUTHENTICATED ROUTES
Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', [AnnouncementController::class, 'list'])->name('dashboard');

    // INVENTORY YARD
    Route::prefix('yardinventory')->group(function () {
        Route::get('/list', [InventoryYardFileController::class, 'list'])->name('yardinventory.list');
        Route::get('/form', function () {
            return view('yardinventory.form');
        })->name('yardinventory.form');
        Route::post('/save', [InventoryYardFileController::class, 'save'])->name('yardinventory.save');
        Route::get('/table', [InventoryYardFileController::class, 'table'])->name('yardinventory.table')->middleware('check.type');
        Route::get('/list-inventory-yard', [InventoryYardFileController::class, 'listInventoryYard'])->name('yardinventory.list-inventory-yard');
        Route::get('/list-density-forecast', [InventoryYardFileController::class, 'listDensityForecast'])->name('yardinventory.list-density-forecast');
        Route::get('/delete', [InventoryYardFileController::class, 'delete'])->name('yardinventory.delete');
    });

    // CONTAINER OPERATION INFORMATION
    Route::prefix('container-info')->group(function () {
        Route::get('/form', function () {
            return view('container-info.form');
        })->name('container-info.form');
        Route::post('/search', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.search');
        Route::get('/table', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.table');
    });

    // VESSEL OPERATION SUMMARY
    Route::prefix('vessel-operation-summary')->group(function () {
        Route::post('/table', [ApiAuthController::class, 'vesselOperationSummary'])->name('vessel-operation-summary.table');
        Route::get('/form', function () {
            return view('vessel-operation-summary.form');
        })->name('vessel-operation-summary.form');
    });

    // USERS
    Route::prefix('user')->group(function () {
        Route::get('/form', function () {
            return view('users.form');
        })->name('user.form');
        Route::post('/create', [AuthController::class, 'create'])->name('user.create');
        Route::get('/reset.password', [AuthController::class, 'updatePassword'])->name('user.reset.password');
        Route::post('/activating', [AuthController::class, 'activatingUser'])->name('user.activating');
        Route::get('/profile', function () {
            return view('users.profile');
        })->name('user.profile');
        Route::get('/activate', [AuthController::class, 'activateUser'])->name('user.activate');
        Route::get('/profile-update', function () {
            return view('users.profile-update');
        })->name('user.profile-update');
        Route::post('/update.password', [AuthController::class, 'updateProfile'])->name('user.update.password');
        Route::get('/profile-edit', [AuthController::class, 'editUser'])->name('user.profile-edit');
        Route::get('/update', [AuthController::class, 'updateUser'])->name('user.update');
        Route::get('/delete', [AuthController::class, 'deleteUser'])->name('user.delete');
    });

    // ANNOUNCEMENTS
    Route::prefix('announcements')->group(function () {
        Route::get('/create', function () {
            return view('announcements.create');
        })->name('announcements.create')->middleware('check.type');
        Route::post('/save', [AnnouncementController::class, 'save'])->name('announcement.save');
        Route::get('/table', [AnnouncementController::class, 'table'])->name('announcements.table')->middleware('check.type');
        Route::get('/post', [AnnouncementController::class, 'show'])->name('announcements.post');
        Route::get('/delete', [AnnouncementController::class, 'delete'])->name('announcement.delete');
        Route::get('/edit', [AnnouncementController::class, 'editAnnouncement'])->name('announcement.edit');
        Route::get('/update', [AnnouncementController::class, 'updateAnnouncement'])->name('announcement.update');
    });

    // SHIP AGENCY CODES
    Route::prefix('shipagency')->group(function () {
        Route::get('/create', [ShipAgency::class, 'create'])->name('shipagency.create')->middleware('check.type');
        Route::post('/store', [ShipAgency::class, 'store'])->name('shipagency.store')->middleware('check.type');
        Route::get('/listbox', [ShipAgency::class, 'listBox'])->name('components.listboxShipAgencyCodes');
    });

    // USERS LIST
    Route::get('/users/new-users-list', [AuthController::class, 'newRequestList'])->name('users.new-users-list');
    Route::get('/users/table', [AuthController::class, 'table'])->name('users.table')->middleware('check.type');

    //BERTH LIST
    Route::get('/berth/table', [ApiAuthController::class, 'operationBerth'])->name('berth.table');

});

// ERROR ROUTE
Route::get('{any}', function () {
    return view('errors.404');
})->where('any', '.*');
