<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantsManagementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterPassenger;
use App\Livewire\TicketValidator;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('index');
// });


Route::view("/", "index")->name("show.index");
Route::view("/aboutus","aboutus")->name("show.aboutus");
Route::view("/support","support")->name("show.support");
Route::view('/admin/testvalidator','admin.ticket-validator')->name('show.validator');


Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'index')->name('show.login');
    Route::post("/login/user", "login")->name("user.login");
    Route::get('/logout', 'logout')->name("user.logout");
});


Route::controller(ApplicantController::class)->group(function(){
    Route::get("/application", "index")->name("application");
    Route::post('/application', 'store')->name('application.store');
    Route::put('/passenger/{applicant}/update', 'update')->name('passenger.update');

});

// Route::get('/ticket-validator', TicketValidator::class)->name('ticket.validator');
// Route::get('/ticket-validator', function () {
//     return 'route hit!';
// });


Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('show.admin-portal');
Route::get('/admin/dashboard/page/{page}', [AdminController::class, 'loadPage'])->name("admin.dashboard.page");

Route::put('/admin/{admin}/update', [AdminManagementController::class, 'update'])->name('admin.update');



// Route::middleware(['check.role:admin'])->group(function () {
//     Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
// });


Route::get('/passenger/dashboard', [PassengerController::class, 'showpassenger'])->name('show.passenger.dashboard');
Route::get('/passenger/dashboard/page/{page}', [PassengerController::class, 'loadPage'])->name("passenger.dashboard.page");
Route::post('/passenger/create/{applicant}', [RegisterPassenger::class,'RegisterPassengerWithOnlinePayment'])->name('passenger.register');
Route::post('/passenger/renew/{passenger}', [PassengerController::class, 'renewPassenger'])->name('passenger.renew');
Route::patch('/passenger/suspend/{passenger}', [PassengerController::class,'suspendPassenger'])->name('passenger.suspend');
Route::get('/admin/applicants/page/{province}', [AdminController::class, 'index'])->name('admin.applicant-manager');

Route::prefix('/admin/applications')->controller(ApplicantsManagementController::class)->group(function () {
    Route::get('/{province}', 'index')->name('admin.applications.index');
    Route::get('/applicant/{applicant}', 'show')->name('admin.applications.show');
    Route::patch('/applicant/{applicant}/approve', 'approve')->name('admin.applications.approve');
    Route::patch('/applicant/{applicant}/reject', 'reject')->name('admin.applications.reject');
});

Route::get('/admin/passengers/{passenger}', [PassengerController::class, 'fetchByID'])->name('admin.passenger.show');


Route::post('/fetch-passenger', [PassengerController::class, 'fetchByToken'])->name('fetch.passenger');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
