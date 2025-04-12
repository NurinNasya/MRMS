<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        // Example: Save booking details (adjust as needed)
        $booking = new Booking();
        $booking->user_id = $request->user_id;
        $booking->room_id = $request->room_id;
        $booking->date = $request->date;
        $booking->time = $request->time;
        $booking->status = $request->status;
        $booking->save();

        return redirect('/dashboard')->with('success', 'Booking created successfully!');
    }
}
