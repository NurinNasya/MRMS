<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Models\MeetingRoom;
use Illuminate\Http\Request;

class EquipmentController extends Controller
{
    public function index(Request $request)
    {
        $roomsQuery = MeetingRoom::query();
        $equipmentRoomsQuery = MeetingRoom::with('equipment')->whereHas('equipment');

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;

            $roomsQuery->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('code', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('capacity', 'LIKE', "%{$searchTerm}%");
            });

            $equipmentRoomsQuery->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('code', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('capacity', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('equipment', function ($eq) use ($searchTerm) {
                        $eq->where('equipment_name', 'LIKE', "%{$searchTerm}%");
                    });
            });
        }

        $rooms = $roomsQuery->paginate(5, ['*'], 'rooms_page');
        $equipments = $equipmentRoomsQuery->paginate(5, ['*'], 'equipment_page');

        return view('equipment.index', compact('rooms', 'equipments'));
    }

    public function create($room_id = null)
    {
        $room = $room_id ? MeetingRoom::findOrFail($room_id) : null;
        return view('equipment.create', compact('room'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'meeting_room_id' => 'required|exists:meeting_rooms,id',
            'equipment_name' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string',
        ]);

        Equipment::create($validated);

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }

    public function edit(Equipment $equipment)
    {
        $room = MeetingRoom::findOrFail($equipment->meeting_room_id);
        return view('equipment.edit', compact('equipment', 'room'));
    }

    public function update(Request $request, $id)
    {
        if (isset($request->equipments)) {
            foreach ($request->equipments as $equipmentData) {
                $equipment = Equipment::find($equipmentData['id']);
                $equipment->quantity = $equipmentData['quantity'];
                $equipment->status = $equipmentData['status'];
                $equipment->save();
            }

            return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully!');
        } else {
            $equipment = Equipment::find($id);
            $equipment->equipment_name = $request->equipment_name;
            $equipment->quantity = $request->quantity;
            $equipment->status = $request->status;
            $equipment->save();

            return redirect()->route('equipment.index')->with('success', 'Equipment updated successfully!');
        }
    }

    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return redirect()->back()->with('success', 'Equipment deleted successfully!');
    }

    // Bulk edit
    public function editMultiple($roomId)
    {
        $room = MeetingRoom::with('equipment')->findOrFail($roomId);
        $equipments = $room->equipment;
        $isBulk = true;

        return view('equipment.edit', compact('room', 'equipments', 'isBulk'));
    }

    // Bulk update
    public function updateMultiple(Request $request)
    {
        $equipmentUpdates = $request->input('equipments');

        if (!is_array($equipmentUpdates)) {
            return redirect()->back()->with('error', 'No equipment data received.');
        }

        foreach ($equipmentUpdates as $equipmentData) {
            if (!isset($equipmentData['id'])) {
                continue;
            }

            $equipment = Equipment::find($equipmentData['id']);
            if ($equipment) {
                $equipment->update([
                    'quantity' => (int) $equipmentData['quantity'],
                    'status' => (string) $equipmentData['status'],
                ]);
            }
        }

        return redirect()->route('equipment.index')->with('success', 'Equipments updated successfully.');
    }
}