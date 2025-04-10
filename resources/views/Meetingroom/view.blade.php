@extends('layout.admin') 

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h6 class="text-lg font-semibold text-gray-800">View Meeting Room</h6>
            <!-- Pencil Icon for Editing -->
            <a href="{{ route('meetingroom.edit', $room->id) }}" class="text-gray-600 hover:text-gray-800">
                <!-- Heroicons Pencil Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.293 4.293a1 1 0 011.414 0l2.828 2.828a1 1 0 010 1.414L8.121 16.121a1 1 0 01-.29.194l-4.768 1.585a1 1 0 01-1.243-1.243l1.585-4.768a1 1 0 01.194-.29L16.293 4.293z"/>
                </svg>
            </a>
        </div>
        
        <div class="px-6 py-6">
            <!-- Display Room Information -->
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Room Name</label>
                <p class="text-gray-900">{{ $room->room_name }}</p> <!-- Displaying Room Name -->
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Capacity</label>
                <p class="text-gray-900">{{ $room->capacity }}</p> <!-- Displaying Capacity -->
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <p class="text-gray-900">{{ $room->status }}</p> <!-- Displaying Status -->
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Room Code</label>
                <p class="text-gray-900">{{ $room->room_code }}</p> <!-- Displaying Room Code -->
            </div>

            <!-- Button or link to navigate back to the dashboard -->
            <div>
                {{--<a href="{{ route('meetingroom.dashboard') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300">--}}
                    
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
