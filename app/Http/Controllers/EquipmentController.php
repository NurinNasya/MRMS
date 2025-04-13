<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\MeetingRoom;

class EquipmentController extends Controller
{
    // Show all equipment grouped by room with optional search and pagination
    public function index(Request $request)
    {
        $roomsQuery = MeetingRoom::with('equipment'); // Eager load equipment relation

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $roomsQuery->where(function($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('code', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('capacity', 'LIKE', "%{$searchTerm}%")
                  ->orWhereHas('equipment', function ($eq) use ($searchTerm) {
                      $eq->where('equipment_name', 'LIKE', "%{$searchTerm}%");
                  });
            });
        }

        $equipments = $roomsQuery->orderBy('created_at', 'desc')->paginate(10);

        return view('equipment.index', compact('equipments'));
    }

    // Show the create form
    public function create($room = null)
    {
        $rooms = MeetingRoom::all();
        $selectedRoom = $room ? MeetingRoom::find($room) : null;

        return view('equipment.create', [
            'rooms' => $rooms,
            'selectedRoom' => $selectedRoom
        ]);
    }

    // Store new equipment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|string|in:Available,In Use,Under Maintenance',
        ]);

        $room = MeetingRoom::find($validated['room_id']);
        $validated['room'] = $room->name;

        Equipment::create($validated);

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        $rooms = MeetingRoom::all();

        return view('equipment.edit', compact('equipment', 'rooms'));
    }

    // Update existing equipment
    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'room_id' => 'required|exists:rooms,id',
            'status' => 'required|string|in:Available,Under Maintenance,In Use',
        ]);

        $room = MeetingRoom::find($validated['room_id']);
        $validated['room'] = $room->name;

        $equipment->update($validated);

        return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully!');
    }

    // Delete equipment
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('equipment.index')->with('success', 'Equipment deleted successfully!');
    }
}
