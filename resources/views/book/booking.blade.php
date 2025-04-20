@extends('layout.user')

@section('content')
    <div class="p-6">
    <h2 class="text-2xl font-semibold text-green-700 mb-4">Booking Page</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-gradient-to-r from-green-500 to-green-700 text-white text-left text-sm">
                    <tr>
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Capacity</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $room->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->capacity }}</td>
                            <td class="py-3 px-4 border-b">
                                <span
                                    class="px-3 py-1 rounded-full text-white {{ $room->status == 'Available' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $room->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b text-center">
                            <a href="{{ route('book.room', $room->id) }}"
                            class="px-4 py-2 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300 transition-all duration-300">
                            Book Now
                            </a>
                        </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection