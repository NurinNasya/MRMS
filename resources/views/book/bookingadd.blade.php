@extends('layout.user')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold text-black-700 mb-4">Book a Room</h2>

    <h3>{{ $room->room_name }}</h3>

    <form method="POST" action="{{ route('book.store', $room->id) }}">
        @csrf

        {{--<input type="hidden" name="meeting_room_id" value="{{ $room->id }}">--}}

        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Start Slot</label>
            <input type="datetime-local" name="start_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Start Slot" required>
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">End Slot</label>
            <input type="datetime-local" name="end_time" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter End Slot" required>
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Participant</label>
            <input type="text" name="participant" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Participant" required>
        </div>

        <div class="mb-4">
            <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Meeting Agenda</label>
            <input type="text" name="meeting_agenda" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Enter Meeting Agenda" required>
        </div>

        <div>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
