@extends('layout.user')

@section('content')
<div class="p-6">
        <h2 class="text-2xl font-semibold text-green-700 mb-4 text-center">My Bookings</h2>

    @if($bookings->isEmpty())
        <p class="text-center text-lg text-gray-500">You have no bookings yet.</p>
    @else
    <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gradient-to-r from-green-500 to-green-700 text-white text-left text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">Booking ID</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Start Slot</th>
                        <th class="py-3 px-4 border-b">End Slot</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $booking->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->meetingRoom->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->start_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $booking->end_time }}</td>
                            <td class="py-3 px-4 border-b">
                                <span class="px-3 py-1 rounded-full text-white 
                                    @if ($booking->status == 'Pending') bg-yellow-400 
                                    @elseif ($booking->status == 'Approved') bg-green-500 
                                    @elseif ($booking->status == 'Rejected') bg-red-500 
                                    @else bg-gray-400 
                                    @endif">
                                    {{ $booking->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b text-center">
                                <a href="{{ route('book.view', ['id' => $booking->id]) }}"
                                class="inline-flex items-center justify-center text-blue-600 hover:text-blue-800">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
