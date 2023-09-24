<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MeetupController;
use App\Http\Controllers\GroupController;

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

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('pages.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/meetups', [MeetupController::class, 'index'])->name('meetups.index');
    Route::get('/meetups/create', [MeetupController::class, 'create'])->name('meetups.create');
    Route::post('/meetups/create', [MeetupController::class, 'store'])->name('meetups.store');

    Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
});




require __DIR__.'/auth.php';
