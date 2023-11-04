<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
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

Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect('/meetups');
    });

    Route::prefix('/meetups')->group(function () {
        Route::get('/', [MeetupController::class, 'index'])->name('meetups.index');
        Route::get('/create', [MeetupController::class, 'create'])->name('meetups.create');
        Route::post('/create', [MeetupController::class, 'store'])->name('meetups.store');
        Route::get('/edit/{id}', [MeetupController::class, 'edit'])->name('meetups.edit');
        Route::put('/update/{id}', [MeetupController::class, 'update'])->name('meetups.update');
        Route::delete('/{id}', [MeetupController::class, 'destroy'])->name('meetups.destroy');
        Route::get('/my-meetups', [MeetupController::class, 'myMeetups'])->name('meetups.my-meetups');
        Route::put('/not-going/{id}', [MeetupController::class, 'notGoing'])->name('meetups.not-going');
        Route::get('/filter-meetups', [MeetupController::class, 'filter'])->name('meetups.filter');
    });

    Route::prefix('/groups')->group(function() {
        Route::get('/', [GroupController::class, 'index'])->name('groups.index');
        Route::get('/my-groups', [GroupController::class, 'myGroups'])->name('groups.my-groups');
    });

});

require __DIR__.'/auth.php';