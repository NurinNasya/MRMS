@extends('layout.user')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <div class="bg-white shadow-xl rounded-2xl">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-700 px-6 py-4 flex items-center justify-between rounded-t-2xl">
            <h2 class="text-xl font-semibold text-white">Booking Details</h2>
        </div>

        <!-- Booking Info -->
        <div class="px-6 py-8 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Dynamic Info -->
                <div>
                    <p class="text-sm text-gray-500">Booking ID</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Start Time</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->start_time }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">End Time</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->end_time }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Participants</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->participant }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <p class="inline-block px-3 py-1 text-sm rounded-full font-semibold
                        @if($booking->status == 'approved') bg-green-100 text-green-700
                        @elseif($booking->status == 'rejected') bg-red-100 text-red-700
                        @elseif($booking->status == 'canceled') bg-gray-200 text-gray-700
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ ucfirst($booking->status) }}
                    </p>
                </div>
            </div>

            <!-- Agenda -->
            <div class="mt-8">
                <p class="text-sm text-gray-500 mb-1">Meeting Agenda</p>
                <div class="bg-white rounded-lg p-4 shadow-sm text-gray-800">
                    {{ $booking->meeting_agenda }}
                </div>
            </div>

            <!-- Equipment List -->
            <div class="mt-8">
                <p class="text-sm text-gray-500 mb-1">Equipment in this room</p>
                <div class="bg-white rounded-lg p-4 shadow-sm text-gray-800">
                    @forelse ($booking->meetingRoom->equipment as $equipment)
                        <p class="text-base font-medium text-gray-800">{{ $equipment->equipment_name }} ({{ $equipment->quantity }} - {{ $equipment->status }})</p>
                    @empty
                        <p class="text-gray-500">No equipment assigned to this booking.</p>
                    @endforelse
                </div>
            </div>

            <!-- Cancel Booking Button (hidden if status is rejected) -->
            @if($booking->status != 'Rejected')
            <div class="mt-10 text-center">
                <form action="{{ route('book.cancel', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-block bg-red-600 hover:bg-red-700 text-white text-sm font-medium py-2 px-6 rounded-md shadow-md focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-150">
                        Cancel Booking
                    </button>
                </form>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection