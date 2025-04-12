<?php

namespace App\Http\Controllers;

use App\Models\Booking;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // Retrieve all booking data with relevant columns (e.g., user_id, room_id, date, time, status)
        $bookings = Booking::select('user_id', 'room_id', 'date', 'time', 'status')->get();
        
        return view('user.dashboard', compact('bookings'));
    }
}
