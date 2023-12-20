<?php

use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Participant\Auth\ParticipantAuthController; // Add this line
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\SpeakerController;
use App\Http\Controllers\Admin\ColaboratorController;
use App\Http\Controllers\Admin\BiletController;
use App\Http\Controllers\Participant\ShoppingController;
use App\Http\Controllers\Participant\PublicEventsController;
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
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('events', 'App\Http\Controllers\Admin\EventsController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('speakers', 'App\Http\Controllers\Admin\SpeakerController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('agenda', 'App\Http\Controllers\Admin\AgendaController');
});

// PARTICIPANT
// Route::get('/participant/dashboard', [AdminAuthController::class, 'dashboard'])->name('participant.dashboard');
//Auth Participant 
Route::get('/participant/login', [ParticipantAuthController::class, 'index'])->name('participant.login');
Route::post('/participant/custom-login', [ParticipantAuthController::class, 'customLogin'])->name('participant.login.custom');
Route::get('/participant/register', [ParticipantAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [ParticipantAuthController::class, 'customRegistration'])->name('participant.register.store');
Route::get('/participant/signout', [ParticipantAuthController::class, 'signOut'])->name('participant.signout');

Route::resource('participant', 'App\Http\Controllers\Participant\PublicEventsController');
Route::get('/participant/event/{id}', [PublicEventsController::class, 'event'])->name('participant.event');
Route::get('/participant/organizator/{id}', [PublicEventsController::class, 'organizator'])->name('participant.organizator');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('bilet', 'App\Http\Controllers\Admin\BiletController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('agenda', 'App\Http\Controllers\Admin\AgendaController');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('colaborator', 'App\Http\Controllers\Admin\ColaboratorController');
});

 Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('contract', 'App\Http\Controllers\Admin\ContractController');
});


Route::patch('update-cart', [ShoppingController::class, 'update']);
Route::delete('remove-from-cart',[ShoppingController::class, 'remove']);

// Route::get('/', [ShoppingController::class, 'index']); //afisare pagina de start
Route::get('cart',[ShoppingController::class, 'cart']); //cos
Route::get('add-to-cart/{id}',[ShoppingController::class, 'addToCart']);//adaug in
Route::patch('update-cart', [ShoppingController::class, 'update']); //modific cos
Route::delete('remove-from-cart', [ShoppingController::class, 'remove']);