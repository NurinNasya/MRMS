<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetingRoom;
use App\Models\Equipment;


class MeetingRoomController extends Controller
{
    public function index()
    {
        $rooms = MeetingRoom::all(); // or any relevant query
        return view('Meetingroom.roomdashboard', compact('rooms'));
    }

    public function create()
    {
        return view('Meetingroom.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:Available,Booked,In Use',
            'room_code' => 'required|string|max:255',
        ]);

        MeetingRoom::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Meeting room added successfully.');
    }


    public function edit($id)
    {
        // Fetch the room data by its ID
        $room = MeetingRoom::findOrFail($id);

        // Return the edit view with the room data
        return view('meetingroom.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming data
        $request->validate([
            'room_name' => 'required|string|max:255',
            'capacity' => 'required|integer',
            'status' => 'required|string',
            'room_code' => 'required|string|max:10',
        ]);

        // Find the room by ID and update the details
        $room = MeetingRoom::findOrFail($id);
        $room->update([
            'room_name' => $request->room_name,
            'capacity' => $request->capacity,
            'status' => $request->status,
            'room_code' => $request->room_code,
        ]);

        // Redirect back to the dashboard or room view after updating
        return redirect()->route('admin.dashboard')->with('success', 'Room updated successfully.');
    }


    public function view($id)
    {
        // Fetch the meeting room by its ID from the database
        $room = MeetingRoom::findOrFail($id); // This will fetch the room from the database or return a 404 error if not found

        // Pass the room object to the view
        return view('meetingroom.view', compact('room'));
    }

    public function destroy($id)
    {
        // Find the room by ID and delete it
        $room = MeetingRoom::findOrFail($id);
        $room->delete();

        // Redirect back to the admin dashboard or meeting room listing
        return redirect()->route('admin.dashboard')->with('success', 'Room deleted successfully');
    }

}
