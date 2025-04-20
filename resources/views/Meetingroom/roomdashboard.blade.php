@extends('layout.admin')

@section('content')
<div class="p-6">
<h2 class="text-2xl font-semibold text-blue-700 mb-4">Meeting Room Requests</h2>

    <div class="mb-6 text-right">
        <a href="{{ route('meetingroom.add') }}" class="bg-blue-500 text-white text-sm px-5 py-2 rounded hover:bg-blue-600">
            Add Meeting Room
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h3 class="text-xl font-semibold text-gray-700 mb-4">Pending Bookings</h3>

    @if($pendingBookings->isEmpty())
        <p class="text-gray-600">No pending bookings.</p>
    @else
    <div class="blue-glow-border mb-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full rounded-lg">
                <thead class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-left text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Start Time</th>
                        <th class="py-3 px-4 border-b">End Time</th>
                        <th class="py-3 px-4 border-b">Participants</th>
                        <th class="py-3 px-4 border-b">Agenda</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($pendingBookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $booking->meetingRoom->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->meetingRoom->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->start_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->end_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->participant }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->meeting_agenda }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->status }}</td>
                            <td class="py-3 px-4 border-b text-center">
                                <div class="flex justify-center space-x-2">
                                    <!-- Approve button -->
                                    <form action="{{ route('meetingroom.approve', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-green-500 text-white text-sm px-3 py-1 rounded hover:bg-green-600">
                                            Approve
                                        </button>
                                    </form>

                                    <!-- Reject button -->
                                    <form action="{{ route('meetingroom.reject', $booking->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="bg-red-500 text-white text-sm px-3 py-1 rounded hover:bg-red-600">
                                            Reject
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<!-- Separator line -->
<hr class="my-12 border-t-2 border-gray-600">

<!-- New section for approval status -->
<div class="mt-12">
    <h2 class="text-2xl font-semibold text-blue-700 mb-4">Approval Status</h2>
    <div class="blue-glow-border mb-6">
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="min-w-full rounded-lg">
                <thead class="bg-gradient-to-r from-blue-500 to-blue-700 text-white text-left text-sm">
                <tr>
                <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Start Time</th>
                        <th class="py-3 px-4 border-b">End Time</th>
                        <th class="py-3 px-4 border-b">Participants</th>
                        <th class="py-3 px-4 border-b">Agenda</th>
                        <th class="py-3 px-4 border-b text-center">Approval</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
            @foreach($processedBookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $booking->meetingRoom->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->meetingRoom->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->start_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->end_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->participant }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->meeting_agenda }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->status }}</td>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
