<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingRoom;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all(); // Or your query
        return view('book.booking', compact('rooms'));
    }

    /*public function create()
    {
        return view('book.bookingadd');
    }*/
    
    public function bookRoomForm($room_id)
    {
        $room = MeetingRoom::findOrFail($room_id);
        return view('book.bookingadd', compact('room'));
    }

    public function store(Request $request, $room_id)
{
    $validated = $request->validate([
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
        'participant' => 'required|numeric',
        'meeting_agenda' => 'required|string',
    ]);

    Booking::create([
        'meeting_room_id' => $room_id,
        'start_time' => $validated['start_time'],
        'end_time' => $validated['end_time'],
        'participant' => $validated['participant'],
        'meeting_agenda' => $validated['meeting_agenda'],
        'status' => 'Pending',
    ]);

    // Optional: Update meeting room status
    MeetingRoom::where('id', $room_id)->update(['status' => 'Pending']);

    return redirect()->route('book.booking')->with('success', 'Booking successfully created.');
}

    /*public function store(Request $request, $room_id)
    {
        $validated = $request->validate([
            //'meeting_room_id' => 'required|numeric',
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'participant' => 'required|numeric',
            'meeting_agenda' => 'required|string',
        ]);

        Booking::create([
            'meeting_room_id' => $room_id,
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'participant' => $validated['participant'],
            'meeting_agenda' => $validated['meeting_agenda'],
            'status' => 'Pending',
        ]);

        MeetingRoom::where('id', $room_id)->update(['status' => 'Pending']); // Use meeting_room_id

        return redirect()->route('book.booking')->with('success', 'Booking successfully created.');
    }*/

    public function viewBookings($id)
    {
        $booking = Booking::findOrFail($id);  // Find booking or fail
        return view('book.bookingview', compact('booking'));
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
            'participant' => 'required|numeric',
            'meeting_agenda' => 'required|string',
            'room_id' => 'required|numeric',
        ]);

       // $booking = Booking::findOrFail($id);
        //$booking->update($validated);

        return redirect()->route('book.view')->with('success', 'Booking updated successfully.');
    }

    public function myBookings()
    {
        // Since you don't have user_id yet, just fetch all bookings
        $bookings = Booking::with('meetingRoom')->get();
    
        // Use the correct view path
        return view('book.myBookings', compact('bookings'));
    }
    

}
