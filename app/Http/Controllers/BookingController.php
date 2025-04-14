<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingRoom;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        //$rooms = MeetingRoom::all(); // now using MeetingRoom
        return view('book.booking');
    }

    public function create()
    {
        return view('book.bookingadd');
    }

    public function bookRoomForm($room_id)
    {
        //$room = MeetingRoom::findOrFail($room_id);
        return view('book.bookingadd', compact('room'));
    }

    public function store(Request $request, $room_id)
    {
        $validated = $request->validate([
            'user_id' => 'required|numeric',
            'room_id' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'participants' => 'required|numeric',
            'agenda' => 'required|string',
        ]);

        Booking::create([
            'user_id' => $validated['user_id'],
            'room_id' => $validated['room_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'participants' => $validated['participants'],
            'agenda' => $validated['agenda'],
            'status' => 'Pending',
        ]);

        MeetingRoom::where('id', $room_id)->update(['status' => 'Booked']);

        return redirect()->route('book.index')->with('success', 'Booking successfully created.');
    }

    public function viewBookings()
    {
        $bookings = Booking::with('room')->get(); // assumes Booking has a 'room' relationship
        return view('book.bookingview', compact('bookings'));
    }

    public function edit($id)
    {
        //$booking = Booking::findOrFail($id);
       // $rooms = MeetingRoom::all();
        return view('book.bookingedit', compact('booking', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'participants' => 'required|numeric',
            'agenda' => 'required|string',
            'room_id' => 'required|numeric',
        ]);

       // $booking = Booking::findOrFail($id);
        //$booking->update($validated);

        return redirect()->route('book.view')->with('success', 'Booking updated successfully.');
    }
}
