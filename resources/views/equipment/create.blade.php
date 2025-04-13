@extends('layout.admin')

@section('content')
<div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
    <h2 class="text-2xl font-semibold text-center mb-6">
        @isset($selectedRoom)
            Add Equipment to {{ $selectedRoom->name }}
        @else
            Add New Equipment
        @endisset
    </h2>

    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf

        <!-- Hidden room_id field -->
        @isset($selectedRoom)
            <input type="hidden" name="room_id" value="{{ $selectedRoom->id }}">
        @endisset

        <!-- Equipment Name -->
        <div class="mb-4">
            <label for="equipment_name" class="block font-medium">Equipment Name</label>
            <input type="text" name="equipment_name" id="equipment_name"
                   class="w-full border border-gray-300 p-2 rounded mt-1"
                   value="{{ old('equipment_name') }}" required>
            @error('equipment_name') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <!-- Quantity -->
        <div class="mb-4">
            <label for="quantity" class="block font-medium">Quantity</label>
            <input type="number" name="quantity" id="quantity"
                   class="w-full border border-gray-300 p-2 rounded mt-1"
                   value="{{ old('quantity') }}" required min="1">
            @error('quantity') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
        
        <!-- Room Selection -->
        <div class="mb-4">
            <label for="room_id" class="block font-medium">Room</label>
            <select name="room_id" id="room_id"
                    class="w-full border border-gray-300 p-2 rounded mt-1"
                    @isset($selectedRoom) disabled @endisset required>
                @isset($selectedRoom)
                    <option value="{{ $selectedRoom->id }}" selected>{{ $selectedRoom->name }}</option>
                @else
                    <option value="" disabled selected>-- Select Room --</option>
                    @foreach($rooms as $room)
                        <option value="{{ $room->id }}" {{ old('room_id') == $room->id ? 'selected' : '' }}>
                            {{ $room->name }} ({{ $room->code }})
                        </option>
                    @endforeach
                @endisset
            </select>
            @error('room_id') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label for="status" class="block font-medium">Status</label>
            <select name="status" id="status"
                    class="w-full border border-gray-300 p-2 rounded mt-1"
                    required>
                <option value="" disabled selected>-- Select Status --</option>
                <option value="Available" {{ old('status') == 'Available' ? 'selected' : '' }}>Available</option>
                <option value="In Use" {{ old('status') == 'In Use' ? 'selected' : '' }}>In Use</option>
                <option value="Under Maintenance" {{ old('status') == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
            </select>
            @error('status') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <!-- Buttons -->
        <div class="flex justify-between">
            <button type="submit"
                    class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md">
                Add
            </button>
            <a href="{{ route('equipment.index') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                Back
            </a>
        </div>
    </form>
</div>
@endsection