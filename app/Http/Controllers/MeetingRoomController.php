<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MeetingRoom;
use App\Models\Booking;

class MeetingRoomController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all();
        $pendingBookings = Booking::where('status', 'Pending')->with('meetingRoom')->get();
        $processedBookings = Booking::whereIn('status', ['Approved', 'Rejected'])->with('meetingRoom')->get();

        return view('MeetingRoom.roomdashboard', compact('rooms', 'pendingBookings', 'processedBookings'));
    }

    public function create()
    {
        return view('Meetingroom.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_name' => 'required|string|max:255|unique:meeting_rooms,room_name',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:Available,Booked,In Use',
            'room_code' => 'required|string|max:255|unique:meeting_rooms,room_code',
        ]);

        MeetingRoom::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Meeting room added successfully.');
    }

    public function edit($id)
    {
        $room = MeetingRoom::findOrFail($id);
        return view('meetingroom.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = MeetingRoom::findOrFail($id);

        $request->validate([
            'room_name' => 'required|string|max:255|unique:meeting_rooms,room_name,' . $room->id,
            'capacity' => 'required|integer',
            'status' => 'required|string',
            'room_code' => 'required|string|max:255|unique:meeting_rooms,room_code,' . $room->id,
        ]);

        $room->update([
            'room_name' => $request->room_name,
            'capacity' => $request->capacity,
            'status' => $request->status,
            'room_code' => $request->room_code,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Room updated successfully.');
    }

    public function view($id)
    {
        $room = MeetingRoom::findOrFail($id);
        return view('meetingroom.view', compact('room'));
    }

    public function destroy($id)
    {
        $room = MeetingRoom::findOrFail($id);
        $room->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Room deleted successfully');
    }

    public function approveBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Approved';
        $booking->save();

        return redirect()->route('meetingroom.dashboard')->with('success', 'Booking approved successfully.');
    }

    public function rejectBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = 'Rejected';
        $booking->save();

        return redirect()->route('meetingroom.dashboard')->with('success', 'Booking rejected successfully.');
    }
}