<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminManagementController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ApplicantsManagementController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RegisterPassenger;
use Illuminate\Support\Facades\Route;


Route::view("/", "index")->name("show.index");
Route::view("/aboutus","aboutus")->name("show.aboutus");
Route::view("/support","support")->name("show.support");


Route::middleware('check.admin')->group(function() {
    Route::view('/admin/testvalidator','admin.ticket-validator')->name('show.validator');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('show.admin-portal');
    Route::get('/admin/dashboard/page/{page}', [AdminController::class, 'loadPage'])->name("admin.dashboard.page");
    Route::put('/admin/{admin}/update', [AdminManagementController::class, 'update'])->name('admin.update');
    Route::get('/admin/passengers/{passenger}', [PassengerController::class, 'fetchByID'])->name('admin.passenger.show');
    Route::post('/fetch-passenger/{station_id}', [PassengerController::class, 'fetchByToken'])->name('fetch.passenger');
    Route::patch('/passenger/suspend/{passenger}', [PassengerController::class,'suspendPassenger'])->name('passenger.suspend');
    Route::patch('/passenger/unsuspend/{passenger}', [PassengerController::class,'unsuspendPassenger'])->name('passenger.unsuspend');
    Route::get('/admin/applicants/page/{province}', [AdminController::class, 'index'])->name('admin.applicant-manager');
});


Route::prefix('/admin/applications')->controller(ApplicantsManagementController::class)->middleware('check.admin')->group(function () {
    Route::get('/applicant/{applicant}', 'show')->name('admin.applications.show');
    Route::patch('/applicant/{applicant}/approve', 'approve')->name('admin.applications.approve');
    Route::patch('/applicant/{applicant}/reject', 'reject')->name('admin.applications.reject');
});


Route::middleware('check.user')->prefix('/passenger')->group(function(){
    Route::post('/create/{applicant}', [RegisterPassenger::class,'RegisterPassengerWithOnlinePayment'])->name('passenger.register');
    Route::post('/renew/{passenger}', [PassengerController::class, 'renewPassenger'])->name('passenger.renew');
    Route::put('/{applicant}/update', [ApplicantController::class, 'update'])->name('passenger.update');
    Route::get('/dashboard', [PassengerController::class, 'showpassenger'])->name('show.passenger.dashboard');
    Route::get('/dashboard/page/{page}', [PassengerController::class, 'loadPage'])->name("passenger.dashboard.page");
    Route::post('suspend/{applicantID}', [PassengerController::class, 'cancelPassenger'])->name('cancel.passenger');
    Route::get("/payment/{type}", [PaymentController::class, 'show'])->name('show.payment');

});


Route::controller(AuthController::class)->group(function(){
    Route::get('/login', 'index')->name('show.login');
    Route::post("/login/user", "login")->name("user.login");
    Route::get('/logout', 'logout')->name("user.logout");
});


Route::controller(ApplicantController::class)->group(function(){
    Route::get("/application", "index")->name("application");
    Route::post('/application', 'store')->name('application.store');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
