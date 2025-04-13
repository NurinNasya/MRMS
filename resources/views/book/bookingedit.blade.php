@extends('layout.user')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold text-blue-700 mb-6">Book Meeting Room: {{ $room->room_name }}</h2>

    <form action="{{ route('meeting-rooms.book', $room->room_id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 mb-1">User ID</label>
            <input type="text" id="user_id" name="user_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter User ID" required>
        </div>

        <input type="hidden" name="room_id" value="{{ $room->room_id }}">

        <div class="mb-4">
            <label for="booking_date" class="block text-gray-700 mb-1">Booking Date</label>
            <input type="date" id="booking_date" name="booking_date" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-4">
            <div>
                <label for="start_time" class="block text-gray-700 mb-1">Start Time</label>
                <input type="time" id="start_time" name="start_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="end_time" class="block text-gray-700 mb-1">End Time</label>
                <input type="time" id="end_time" name="end_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="participants" class="block text-gray-700 mb-1">Participants</label>
            <input type="text" id="participants" name="participants" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Participants (comma separated)" required>
        </div>

        <div class="mb-6">
            <label for="agenda" class="block text-gray-700 mb-1">Meeting Agenda</label>
            <textarea id="agenda" name="agenda" rows="3" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Meeting Agenda" required></textarea>
        </div>

        <div class="flex space-x-4">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Save Booking
            </button>
            <a href="{{ route('meeting-rooms.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold px-6 py-2 rounded">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection