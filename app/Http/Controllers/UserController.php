<?php

namespace App\Http\Controllers;
use App\Models\MeetingRoom;
use App\Models\Booking;

class UserController extends Controller
{
    public function index()
    {
          // Fetch all rooms
          $rooms = MeetingRoom::all();
        
          // Fetch the user's pending bookings (direct query)
          $pendingBookings = Booking::where('status', 'Pending')
                                      ->get();
          
          // Pass both the rooms and pendingBookings to the view
          return view('userdashboard', compact('rooms', 'pendingBookings'));

        //$rooms = MeetingRoom::all(); // or any relevant query
        //return view('userdashboard', compact('rooms'));
    }
}