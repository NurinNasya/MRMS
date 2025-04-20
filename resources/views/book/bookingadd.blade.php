@extends('layout.user')

@section('content')
<div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold text-black-700 mb-4">Book a Room</h2>

    <h3 class="mb-2 text-lg font-bold text-gray-800">{{ $room->room_name }}</h3>

    {{-- Suggested next available time slot --}}
    <p class="text-sm text-gray-500 mb-4">
        Next available time: {{ \Carbon\Carbon::parse($suggestedStart)->format('d M Y, h:i A') }} to 
        {{ \Carbon\Carbon::parse($suggestedEnd)->format('h:i A') }}
    </p>

    @if ($errors->has('error'))
        <div class="mb-4 text-red-600 font-medium">
            {{ $errors->first('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('book.store', $room->id) }}">
        @csrf

        <div class="mb-4">
            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Start Slot</label>
            <input type="datetime-local" name="start_time"
                   value="{{ old('start_time', $suggestedStart) }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">End Slot</label>
            <input type="datetime-local" name="end_time"
                   value="{{ old('end_time', $suggestedEnd) }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   required>
        </div>

        <div class="mb-4">
            <label for="participant" class="block text-sm font-medium text-gray-700 mb-1">
                Participants (Max: {{ $room->capacity }})
            </label>
            <input type="number" name="participant"
                   value="{{ old('participant') }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Enter number of participants"
                   min="1" max="{{ $room->capacity }}" required>

            @if ($errors->has('participant'))
                <p class="text-red-600 text-sm mt-1">{{ $errors->first('participant') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="meeting_agenda" class="block text-sm font-medium text-gray-700 mb-1">Meeting Agenda</label>
            <input type="text" name="meeting_agenda" value="{{ old('meeting_agenda') }}"
                   class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                   placeholder="Enter meeting agenda" required>
        </div>

        <div>
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded">
                Save
            </button>
        </div>
    </form>
</div>
@endsection