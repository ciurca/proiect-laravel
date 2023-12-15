<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\SpeakerController;
use Illuminate\Support\Facades\Route;

// Admin/Organizator

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

//Auth Organizator
Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('/admin/custom-login', [AdminAuthController::class, 'customLogin'])->name('login.custom');
//Route::get('register', [AdminAuthController::class, 'registration'])->name('register-user');
//Route::post('custom-registration', [AdminAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/admin/signout', [AdminAuthController::class, 'signOut'])->name('signout');

// Events
// Route::delete('/events/delete/{post}', [EventsController::class, 'destroy'])->name('admin.events.destroy');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', 'App\Http\Controllers\Admin\EventsController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('speakers', 'App\Http\Controllers\Admin\SpeakerController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('agenda', 'App\Http\Controllers\Admin\AgendaController');
});
