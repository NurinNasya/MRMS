@extends('layout.user')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold text-blue-700 mb-4">Dashboard</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
            <thead class="bg-blue-100 text-gray-700 text-left text-sm">
                <tr>
                    <th class="py-3 px-4 border-b">User ID</th>
                    <th class="py-3 px-4 border-b">Room ID</th>
                    <th class="py-3 px-4 border-b">Date</th>
                    <th class="py-3 px-4 border-b">Time</th>
                    <th class="py-3 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
               {{-- @foreach ($meetingRooms as $room)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b">{{ $room->id }}</td>
                        <td class="py-3 px-4 border-b">{{ $room->room_name }}</td>
                        <td class="py-3 px-4 border-b">{{ $room->room_code }}</td>
                        <td class="py-3 px-4 border-b">{{ $room->capacity }}</td>
                        <td class="py-3 px-4 border-b">
                            <span class="px-3 py-1 rounded-full text-white
                                @if ($room->status == 'Available') bg-green-500
                                @elseif ($room->status == 'Booked') bg-yellow-500
                                @elseif ($room->status == 'In Use') bg-red-500
                                @else bg-gray-500 @endif">
                                {{ $room->status }}
                            </span>
                        </td>--}}
                        <td class="py-3 px-4 border-b text-center">
                            <a href="#" class="text-blue-600 hover:text-blue-800 mx-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                </svg>
                            </a>
                        </td>
                    </tr>
                {{--@endforeach--}}
            </tbody>
        </table>
    </div>
</div>
@endsection