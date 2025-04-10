@extends('layout.admin') 

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h6 class="text-lg font-semibold text-gray-800">Edit Meeting Room</h6>
        </div>
        <div class="px-6 py-6">
            <form method="POST" enctype="multipart/form-data" action="{{ route('meetingroom.update', $room->id) }}">
                @csrf
                @method('PUT') <!-- To send a PUT request for updating -->

                <!-- Room Name -->
                <div class="mb-4">
                    <label for="room_name" class="block text-sm font-medium text-gray-700 mb-1">Room Name</label>
                    <input type="text" id="room_name" name="room_name" placeholder="Room Name" value="{{ old('room_name', $room->room_name) }}"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                    <!-- @error('room_name') -->
                        <!-- <p class="text-red-500 text-sm">{{ $message }}</p> -->
                    <!-- @enderror -->
                </div>

                <!-- Capacity -->
                <div class="mb-4">
                    <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacity</label>
                    <input type="number" id="capacity" name="capacity" placeholder="Capacity" value="{{ old('capacity', $room->capacity) }}"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                    <!-- @error('capacity') -->
                        <!-- <p class="text-red-500 text-sm">{{ $message }}</p> -->
                    <!-- @enderror -->
                </div>

                <!-- Status -->
                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="w-full p-2 border border-gray-300 rounded-md" required>
                        <option value="">-- Select Status --</option>
                        <option value="Available" {{ old('status', $room->status) == 'Available' ? 'selected' : '' }}>Available</option>
                        <option value="Booked" {{ old('status', $room->status) == 'Booked' ? 'selected' : '' }}>Booked</option>
                        <option value="In Use" {{ old('status', $room->status) == 'In Use' ? 'selected' : '' }}>In Use</option>
                    </select>
                    <!-- @error('status') -->
                        <!-- <p class="text-red-500 text-sm">{{ $message }}</p> -->
                    <!-- @enderror -->
                </div>

                <!-- Room Code -->
                <div class="mb-4">
                    <label for="room_code" class="block text-sm font-medium text-gray-700 mb-1">Room Code</label>
                    <input type="text" id="room_code" name="room_code" placeholder="Room Code" value="{{ old('room_code', $room->room_code) }}"
                        class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                    <!-- @error('room_code') -->
                        <!-- <p class="text-red-500 text-sm">{{ $message }}</p> -->
                    <!-- @enderror -->
                </div>

                <!-- Submit Button -->
                <div>
                    <button type="submit"
                        class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Save Changes
                    </button>
                </div>
            </form>

            <!-- Success Message -->
            <!-- @if(session('success')) -->
                <!-- <p class="text-green-500 mt-4">{{ session('success') }}</p> -->
            <!-- @endif -->
        </div>
    </div>
</div>
@endsection
