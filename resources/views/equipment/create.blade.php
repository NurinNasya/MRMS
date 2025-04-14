@extends('layout.admin')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
    <h2 class="text-2xl">Add Equipment</h2>

    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf

        {{-- Hidden fields when room is selected --}}
        @isset($room) <!-- Use $room here instead of $selectedRoom -->
            <input type="hidden" name="from_room_view" value="1">
            <input type="hidden" name="meeting_room_id" value="{{ $room->id }}">
        @endisset

        {{-- Equipment Name --}}
        <div class="mb-4">
            <label for="equipment_name" class="block font-medium">Equipment Name</label>
            <input type="text" name="equipment_name" id="equipment_name"
                   class="w-full border border-gray-300 p-2 rounded mt-1 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                   value="{{ old('equipment_name') }}" 
                   placeholder="Enter equipment name" required>
            @error('equipment_name')
                <small class="text-red-500 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        {{-- Quantity --}}
        <div class="mb-4">
            <label for="quantity" class="block font-medium">Quantity</label>
            <input type="number" name="quantity" id="quantity"
                   class="w-full border border-gray-300 p-2 rounded mt-1 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                   value="{{ old('quantity', 1) }}" min="1" placeholder="1" required>
            @error('quantity')
                <small class="text-red-500 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        {{-- Status --}}
        <div class="mb-6">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status"
                    class="w-full border border-gray-300 p-2 rounded mt-1 focus:ring-2 focus:ring-green-500 focus:border-transparent"
                    required>
                <option value="" disabled selected>-- Select Status --</option>
                <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="In Use" {{ old('status') == 'In Use' ? 'selected' : '' }}>In Use</option>
                <option value="Under Maintenance" {{ old('status') == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
            @error('status')
                <small class="text-red-500 mt-1 block">{{ $message }}</small>
            @enderror
        </div>

        {{-- Buttons --}}
        <div class="flex justify-between items-center">
            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-opacity-50">
                Add
            </button>

            <a href="{{ isset($room) ? route('meetingroom.view', $room->id) : route('equipment.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">
                {{ isset($room) ? 'Back to Room' : 'Cancel' }}
            </a>
        </div>
    </form>
</div>
@endsection
