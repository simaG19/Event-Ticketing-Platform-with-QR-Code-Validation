<?php

use App\Http\Controllers\mukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController; // Import EventController

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

Route::get('/', function () {
    return view('welcome');
});

// Default authentication routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::get('/admin', function(){
    return view('admin');
})->name('admin')->middleware('Admin');

// Customer Routes
Route::get('/customer', function(){
    return view('customer');
})->name('customer')->middleware('Customer');

// Event Organizer Routes
Route::get('/organizer', function(){
    return view('organizer');
})->name('organizer')->middleware('Event_organizer');


Route::middleware(['auth', 'Customer'])->group(function(){
  
});
// Group event management routes for event organizers
Route::middleware(['auth', 'Event_organizer'])->group(function () {
    Route::get('/organizer/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/organizer/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/organizer/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/organizer/events/{event}/tickets', [EventController::class, 'viewTickets'])->name('events.tickets')->middleware('Event_organizer');
    Route::get('/organizer/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/organizer/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/organizer/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
});
