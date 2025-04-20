<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingRoom;
use App\Models\Booking;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all(); // Or your query
        return view('book.booking', compact('rooms'));
    }

    public function bookRoomForm($room_id)
    {
        $room = MeetingRoom::findOrFail($room_id);

        // Get the latest booking for this room
        $lastBooking = Booking::where('meeting_room_id', $room_id)
            ->orderBy('end_time', 'desc')
            ->first();

        // Suggest start time: now or 1 minute after last end_time
        $suggestedStart = $lastBooking && $lastBooking->end_time > now()
            ? Carbon::parse($lastBooking->end_time)->addMinute()->format('Y-m-d\TH:i')
            : now()->format('Y-m-d\TH:i');

        // Default end time is 1 hour later
        $suggestedEnd = Carbon::parse($suggestedStart)->addHour()->format('Y-m-d\TH:i');

        return view('book.bookingadd', compact('room', 'suggestedStart', 'suggestedEnd'));
    }

    public function store(Request $request, $room_id)
    {
        $validated = $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
            'participant' => 'required|numeric',
            'meeting_agenda' => 'required|string',
        ]);

        $room = MeetingRoom::findOrFail($room_id);

        if ($validated['participant'] > $room->capacity) {
            return back()->withErrors([
                'participant' => 'The number of participants exceeds the room capacity of ' . $room->capacity . '.'
            ])->withInput();
        }

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

        return redirect()->route('mybookings')->with('success', 'Booking successfully created.');
    }

    public function viewBookings($id)
    {
        $booking = Booking::findOrFail($id);
        return view('book.bookingview', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $rooms = MeetingRoom::all();
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

        $booking = Booking::findOrFail($id);
        $room = MeetingRoom::findOrFail($validated['room_id']);

        if ($validated['participant'] > $room->capacity) {
            return back()->withErrors([
                'participant' => 'The number of participants exceeds the room capacity of ' . $room->capacity . '.'
            ])->withInput();
        }

        $booking->update([
            'meeting_room_id' => $validated['room_id'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'participant' => $validated['participant'],
            'meeting_agenda' => $validated['meeting_agenda'],
        ]);

        return redirect()->route('book.view')->with('success', 'Booking updated successfully.');
    }

    public function myBookings()
    {
        // Since you don't have user_id yet, just fetch all bookings
        $bookings = Booking::with('meetingRoom')->get();
        return view('book.myBookings', compact('bookings'));
    }
}