<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PostController;
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

// LOGIN ROUTES*********************************************************************************************************
Route::get('/', function () {
    return view('login');
})->name('login');

Route::post('/', [AuthController::class, 'validateLogin'])->name('login');

Route::get('/forgot-password', function () {
    return view('forgot-password');
})->name('forgot-password');

Route::get('/password-reset', function () {
    return view('password-reset');
})->name('password-reset');

Route::post('/password/reset', [MailController::class, 'saveNewPassword'])->name('password.update');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// *********************************************************************************************************

// DASHBOARD*********************************************************************************************************
Route::get('/dashboard', [AnnouncementController::class, 'list'])->name('dashboard')->middleware('auth');

// LIST FOR DASHBOARD
Route::get('/yardinventory/list', [InventoryYardFileController::class, 'list'])->name('yardinventory.list')->middleware('auth');

// *********************************************************************************************************


// EMAIL RECOVERY
Route::post('/send-email-recovery', [MailController::class, 'sendEmailRecoveryProcess'])->name('send-email-recovery');
// *********************************************************************************************************

// BERTH*********************************************************************************************************
Route::get('/berth/table', [ApiAuthController::class, 'operationBerth'])->name('berth.table')->middleware('auth');
// *********************************************************************************************************

// ANNOUNCEMENTS*********************************************************************************************************

//  FORM
Route::get('/announcements/create', function () {
    return view('announcements.create');
})->name('announcements.create')->middleware('auth','check.type');
// SAVE
Route::post('/announcement/save', [AnnouncementController::class, 'save'])->name('announcement.save')->middleware('auth');
// ANNOUNCEMENTS LIST   
Route::get('/announcements/table', [AnnouncementController::class, 'table'])->name('announcements.table')->middleware('auth','check.type');
// SINGLE POST
Route::get('/announcements/post', [AnnouncementController::class, 'show'])->name('announcements.post')->middleware('auth');
// *********************************************************************************************************

// INVENTORY YARD*********************************************************************************************************

//  FORM
Route::get('/yardinventory/form', function () {
    return view('yardinventory.form');
})->name('yardinventory.form')->middleware('auth');

// SAVE
Route::post('/yardinventory/save', [InventoryYardFileController::class, 'save'])->name('yardinventory.save')->middleware('auth');

// LIST   
Route::get('/yardinventory/table', [InventoryYardFileController::class, 'table'])->name('yardinventory.table')->middleware('auth','check.type');
Route::get('/yardinventory/list-inventory-yard', [InventoryYardFileController::class, 'listInventoryYard'])->name('yardinventory.list-inventory-yard')->middleware('auth');
Route::get('/yardinventory/list-density-forecast', [InventoryYardFileController::class, 'listDensityForecast'])->name('yardinventory.list-density-forecast')->middleware('auth');

// DELETE
Route::get('/yardinventory/delete', [InventoryYardFileController::class, 'delete'])->name('yardinventory.delete')->middleware('auth');
// *********************************************************************************************************


// CONTAINER OPERATION INFORMATION***************************************************************************************

//  SEARCH FORM API RESTFUL
Route::get('/container-info/form', function () {
    return view('container-info.form');
})->name('container-info.form');
Route::post('/container-info/search', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.search')->middleware('auth');
Route::get('/container-info/table', [ApiAuthController::class, 'containerOperationInformation'])->name('container-info.table')->middleware('auth');
Route::get('/vessel-info/table', [ApiAuthController::class, 'containerOperationInformation'])->name('vessel-info.table')->middleware('auth');
// *********************************************************************************************************

// VESSEL OPERATION SUMMARY
Route::post('/vessel-operation-summary/table', [ApiAuthController::class, 'vesselOperationSummary'])->name('vessel-operation-summary.table')->middleware('auth');
Route::get('vessel-operation-summary/form', function () {
    return view('vessel-operation-summary.form');
})->name('vessel-operation-summary.form')->middleware('auth');
// *********************************************************************************************************

// USERS**************************************************************************************************************

// FORM TO CREATE A NEW USER BY EXTERNAL // SAVE
Route::post('/user/save', [AuthController::class, 'save'])->name('user.save');


// LIST NEW REQUESTS
Route::get('/users/new-users-list', [AuthController::class, 'newRequestList'])->name('users.new-users-list')->middleware('auth');

// FORM TO CREATE A NEW USER BY ADMIN
Route::get('/user/form', function () {
    return view('users.form');
})->name('user.form')->middleware('auth');

// SAVE NEW USER FROM ADMIN
Route::post('/user/create', [AuthController::class, 'create'])->name('user.create')->middleware('auth');

// USER RESET PASSWORD
Route::get('/user/reset.password', [AuthController::class, 'updatePassword'])->name('user.reset.password');

// USER Activate
Route::post('/user/activating', [AuthController::class, 'activatingUser'])->name('user.activating')->middleware('auth');

// EDIT PROFILE
Route::get('/user/profile', function () {
    return view('users.profile');
})->name('user.profile')->middleware('auth');

// USER ACTIVATE NEW REQUESTS
Route::get('/user/activate', [AuthController::class, 'activateUser'])->name('user.activate');

// ********************************************************************************************************************************

// UPDATE PROFILE BY ADMIN*********************************************************************************************************
Route::get('/user/profile-update', function () {
    return view('users.profile-update');
})->name('user.profile-update')->middleware('auth');

Route::post('/user/update.password', [AuthController::class, 'updateProfile'])->name('user.update.password')->middleware('auth');
// EDIT PROFILE BY ADMIN
Route::get('/user/profile-edit', [AuthController::class, 'editUser'])->name('user.profile-edit');
Route::get('/user/update', [AuthController::class, 'updateUser'])->name('user.update');

// DELETE USER
Route::get('/user/delete', [AuthController::class, 'deleteUser'])->name('user.delete');
// ********************************************************************************************************************************


// ANNOUNCEMENTS************************************************************************************************************   
// LIST
Route::get('/users/table', [AuthController::class, 'table'])->name('users.table')->middleware('auth','check.type');

//DELETE
Route::get('/announcement/delete', [AnnouncementController::class, 'delete'])->name('announcement.delete')->middleware('auth');

//EDIT
Route::get('/announcement/edit', [AnnouncementController::class, 'editAnnouncement'])->name('announcement.edit');
Route::get('/announcement/update', [AnnouncementController::class, 'updateAnnouncement'])->name('announcement.update');
// ************************************************************************************************************

// CHARTS
// Route::get('/estadisticas.sample', function () {
//     return view('estadisticas.sample');
// })->name('estadisticas.sample');
// ************************************************************************************************************

//SHIP AGENCY CODES

Route::get('/shipagency/create', [ShipAgency::class, 'create'])->name('shipagency.create')->middleware('auth','check.type');
Route::post('/shipagency/store', [ShipAgency::class, 'store'])->name('shipagency.store')->middleware('auth','check.type');
Route::get('/shipagency/listbox', [ShipAgency::class, 'listBox'])->name('components.listboxShipAgencyCodes')->middleware('auth');

// ERRORS
Route::get('{any}', function () {
    return view('errors.404');
})->where('any', '.*');
// ************************************************************************************************************
