<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingRoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\EquipmentController;

// Redirect root to login
Route::get('/', function () {
    return redirect('/login'); // Redirect to login page on startup
});

// Login & Logout
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Admin route
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // User route
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');

    // MeetingRoomController routes
    Route::get('/meetingroom/dashboard', [MeetingRoomController::class, 'index'])->name('meetingroom.dashboard');
    Route::get('/meetingroom/add', [MeetingRoomController::class, 'create'])->name('meetingroom.add');
    Route::post('/meetingroom/store', [MeetingRoomController::class, 'store'])->name('meetingroom.store');
    Route::get('/meetingroom/edit/{id}', [MeetingRoomController::class, 'edit'])->name('meetingroom.edit');
    Route::put('/meetingroom/update/{id}', [MeetingRoomController::class, 'update'])->name('meetingroom.update');
    Route::get('/meetingroom/view/{id}', [MeetingRoomController::class, 'view'])->name('meetingroom.view');
    Route::delete('/meetingroom/delete/{id}', [MeetingRoomController::class, 'destroy'])->name('meetingroom.destroy');

    // Equipment routes
    Route::prefix('equipment')->group(function () {
        Route::get('/', [EquipmentController::class, 'index'])->name('equipment.index'); // Index route
        Route::get('/create', [EquipmentController::class, 'create'])->name('equipment.create'); // General create route
        Route::get('/create/room/{meetingRoom}', [EquipmentController::class, 'createWithRoom'])->name('equipment.create.with-room'); // Create route with room binding
        Route::post('/equipment', [EquipmentController::class, 'store'])->name('equipment.store');
        
        // Edit route for individual equipment
        Route::get('/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
        
        // Update route for the equipment (ensure PUT method)
        Route::put('/{equipment}', [EquipmentController::class, 'update'])->name('equipment.update');
        
        // Delete route for equipment
        Route::delete('/{equipment}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
    });
    
// ----------------------------
// Booking Routes for User
// ----------------------------


    // Show list of all rooms (for users to choose and book)
    Route::get('/bookings', [BookingController::class, 'index'])->name('book.booking');
    // Show booking form with available rooms
    Route::get('/bookings/add', [BookingController::class, 'create'])->name('book.bookingadd');
    // Show booking form for a specific room
    Route::get('/bookings/room/{room_id}', [BookingController::class, 'bookRoomForm'])->name('book.room');
    // Store booking (form submission)
    Route::post('/bookings/store/{room_id}', [BookingController::class, 'store'])->name('book.store');
    // View all bookings made by users
    Route::get('/bookings/view', [BookingController::class, 'viewBookings'])->name('book.view');
    // Edit a booking
    Route::get('/bookings/{id}/edit', [BookingController::class, 'edit'])->name('book.edit');
    // Update a booking
    Route::put('/bookings/{id}/update', [BookingController::class, 'update'])->name('book.update');

    
    // EquipmentController routes (hers)
    Route::get('/equipment', [EquipmentController::class, 'index'])->name('equipment.index');
    // Make the room parameter optional
    Route::get('/equipment/create/{room?}', [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/equipment', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/equipment/{id}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/equipment/{id}', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/equipment/{id}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
});
