
@extends('layout.admin')

@section('content')
<div class="max-w-3xl mx-auto py-10">
    <div class="bg-white shadow-xl rounded-lg p-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Add Equipment</h2>

        <!-- Display Selected Room -->
        @if($room)
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-medium mb-2">Selected Room</label>
                <input type="text" value="{{ $room->room_name }}" disabled class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" />
            </div>
        @else
            <div class="mb-6">
                <p class="text-red-500">No room available</p>
            </div>
        @endif

        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf

            <!-- Hidden field for meeting room ID -->
            @if($room)
                <input type="hidden" name="meeting_room_id" value="{{ $room->id }}">
            @endif

            <!-- Equipment Name -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Equipment Name</label>
                <input type="text" name="equipment_name" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-medium mb-2">Quantity</label>
                <input type="number" name="quantity" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" min="1" required>
            </div>

            <!-- Status -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-medium mb-2">Status</label>
                <select name="status" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" required>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end">
                <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition duration-150">
                    Save Equipment
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
