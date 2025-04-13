@extends('layout.user')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold text-blue-700 mb-6">Book Meeting Room: {{ $room->room_name }}</h2>

    <form action="{{ route('meeting-rooms.book', $room->room_id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <input type="text" name="user_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter User ID" required>
        </div>

        <div class="mb-4">
            <input type="text" name="room_id" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Room ID" required>
        </div>

        <div class="mb-4">
            <input type="datetime-local" name="start_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Start Time" required>
        </div>

        <div class="mb-4">
            <input type="datetime-local" name="end_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter End Time" required>
        </div>

        <div class="mb-4">
            <input type="text" name="participants" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Participant" required>
        </div>

        <div class="mb-4">
            <input type="text" name="agenda" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Meeting Agenda" required>
        </div>

        <div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
