<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    // Show all equipment with optional search and pagination
    public function index(Request $request)
    {
        $query = Equipment::query();

        if ($request->has('search') && $request->search != '') {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('equipment_id', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('equipment_name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('room', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('status', 'LIKE', "%{$searchTerm}%");
            });
        }

        $equipments = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('equipment.index', compact('equipments'));
    }

    // Show the create form
    public function create()
    {
        return view('equipment.create');
    }

    // Store new equipment
    public function store(Request $request)
    {
        $validated = $request->validate([
            'equipment_id' => 'required|string|max:255|unique:equipment,equipment_id',
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'room' => 'required|string|max:255',
            'status' => 'required|string|in:Available,Under Maintenance,In Use',
        ]);

        Equipment::create($validated);

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $equipment = Equipment::findOrFail($id);
        return view('equipment.edit', compact('equipment'));
    }

    // Update existing equipment
    public function update(Request $request, $id)
    {
        $equipment = Equipment::findOrFail($id);

        $validated = $request->validate([
            'equipment_id' => 'required|string|max:255|unique:equipment,equipment_id,'.$id,
            'equipment_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'room' => 'required|string|max:255',
            'status' => 'required|string|in:Available,Under Maintenance,In Use',
        ]);

        $equipment->update($validated);

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment updated successfully!');
    }

    // Delete equipment
    public function destroy($id)
    {
        $equipment = Equipment::findOrFail($id);
        $equipment->delete();

        return redirect()->route('equipment.index')
            ->with('success', 'Equipment deleted successfully!');
    }
}