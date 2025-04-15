@extends('layout.user')

@section('content')
    <div class="p-6">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Booking Page</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-blue-100 text-gray-700 text-left text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Capacity</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Status</th>
                        <th class="py-3 px-4 border-b text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach($rooms as $room)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $room->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->capacity }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_name }}</td>
                            <td class="py-3 px-4 border-b">
                                <span
                                    class="px-3 py-1 rounded-full text-white {{ $room->status == 'Available' ? 'bg-green-500' : 'bg-red-500' }}">
                                    {{ $room->status }}
                                </span>
                            </td>
                            <td class="py-3 px-4 border-b text-center">
                            <a href="{{ route('book.room', $room->id) }}"
                                    class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    Book Now
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection