<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;
use App\Models\MeetingRoom; // Assuming you have a MeetingRoom model

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $roomsQuery = MeetingRoom::with('equipment');

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

    public function create(Request $request)
    {
        $room = null;
        
        if ($request->has('meeting_room_id')) {
            $room = MeetingRoom::find($request->input('meeting_room_id'));
        }
        
        return view('equipment.create', [
            'rooms' => MeetingRoom::all(),
            'room' => $room
        ]);
    }

    public function store(Request $request)
    {
        // Validate the input data
        $request->validate([
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'meeting_room_id' => 'required|exists:meeting_rooms,id',
        ]);

        // Create the new equipment
        $equipment = new Equipment();
        $equipment->equipment_name = $request->equipment_name;
        $equipment->quantity = $request->quantity;
        $equipment->meeting_room_id = $request->meeting_room_id;
        $equipment->save();

        // Redirect with a success message
        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }

    public function edit(Equipment $equipment)
    {
        return view('equipment.edit', [
            'equipment' => $equipment,
            'rooms' => MeetingRoom::all() // Make sure you pass the rooms to the view
        ]);
    }

    public function update(Request $request, Equipment $equipment)
    {
        $validated = $request->validate([
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'meeting_room_id' => 'required|exists:meeting_rooms,id', // Corrected column name
            'status' => 'required|string|in:Available,In Use,Under Maintenance',
        ]);

        // Update equipment with the validated data
        $equipment->update($validated);

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment updated successfully!');
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();
        return redirect()->route('equipment.index')
            ->with('success', 'Equipment deleted successfully!');
    }
}
