<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingRoomController;

Route::get('/', function () {
    return redirect('/login'); // Redirect to login page on startup
});

Route::middleware(['auth'])->group(function () {
    // Admin route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // User route (staff renamed to user for consistency)
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

//purelyview
//Route::view('/add', 'Meetingroom.add')->name('add');

//Logincontroller
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//MeetingRoomController
// For roomdashboard.blade.php
Route::get('/meetingroom/dashboard', [MeetingRoomController::class, 'index'])->name('meetingroom.dashboard');
Route::get('/meetingroom/add', [MeetingRoomController::class, 'create'])->name('meetingroom.add');
Route::post('/meetingroom/store', [MeetingRoomController::class, 'store'])->name('meetingroom.store');
Route::get('/meetingroom/edit/{id}', [MeetingRoomController::class, 'edit'])->name('meetingroom.edit');
Route::put('/meetingroom/update/{id}', [MeetingRoomController::class, 'update'])->name('meetingroom.update');
Route::get('/meetingroom/view/{id}', [MeetingRoomController::class, 'view'])->name('meetingroom.view');
Route::delete('/meetingroom/delete/{id}', [MeetingRoomController::class, 'destroy'])->name('meetingroom.destroy');





