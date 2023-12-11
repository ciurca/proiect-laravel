<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\EventsController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Admin/Organizator

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');

//Auth Organizator
Route::get('/admin/login', [AdminAuthController::class, 'index'])->name('login');
Route::post('/admin/custom-login', [AdminAuthController::class, 'customLogin'])->name('login.custom');
//Route::get('register', [AdminAuthController::class, 'registration'])->name('register-user');
//Route::post('custom-registration', [AdminAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('/admin/signout', [AdminAuthController::class, 'signOut'])->name('signout');

// Events
// deletes a post
Route::delete('/events/delete/{post}', [EventsController::class, 'destroy'])->name('events.destroy');
