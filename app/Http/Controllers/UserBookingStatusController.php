<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserBooking;

class UserBookingStatusController extends Controller
{
    // Show booking list (index page)
    public function index()
    {
        $bookings = UserBooking::all();
        return view('status_approval.index', compact('bookings'));
    }

    // Save booking data (user)
    public function store(Request $request)
    {
        $booking = new UserBooking();
        $booking->user_id = $request->user_id;
        $booking->room_id = $request->room_id;
        $booking->start_time = $request->start_time;
        $booking->end_time = $request->end_time;
        $booking->participant = $request->participant;
        $booking->agenda = $request->agenda;
        $booking->save();

        return redirect('/status-approval')->with('success', 'Booking submitted!');
    }

    // Show all bookings and status to the user
    public function showStatusPage()
    {
        $bookings = UserBooking::all();
        return view('status_approval.status_approval', compact('bookings'));
    }

    // Show single booking details
    public function showBookingDetails($id)
    {
        $bookings = UserBooking::where('id', $id)->get();
        return view('status_approval.status_approval', compact('bookings'));
    }
}