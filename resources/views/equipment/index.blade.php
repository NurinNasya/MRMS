@extends('layout.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold text-blue-700 mb-4">Choose a Room</h2>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr class="bg-blue-100 text-gray-700 text-left text-sm">
                    <!-- Header cells with top, bottom, and side borders -->
                    <th class="py-3 px-4 border-t border-b border-l border-gray-300 first:rounded-tl-lg">ID</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Room Name</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Room Code</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Capacity</th>
                    <th class="py-3 px-4 border-t border-b border-r border-gray-300 last:rounded-tr-lg text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @foreach ($equipments as $room)
                    <tr class="hover:bg-gray-50">
                        <!-- Body cells with bottom and side borders -->
                        <td class="py-3 px-4 border-b border-l border-gray-300">{{ $room->id }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->room_name }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->room_code }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->capacity }}</td>
                        <td class="py-3 px-4 border-b border-r border-gray-300 text-center">
                            <button class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
                                Add Equip
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    @if ($equipments->hasPages())
    <div class="flex items-center justify-between mt-4">
        <div class="text-sm text-gray-700">
            Showing {{ $equipments->firstItem() }} to {{ $equipments->lastItem() }} of {{ $equipments->total() }} results
        </div>
        <div class="flex space-x-2">
            <!-- Previous Page Link -->
            @if ($equipments->onFirstPage())
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Previous</span>
            @else
                <a href="{{ $equipments->previousPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Previous</a>
            @endif

            <!-- Pagination Elements -->
            @foreach ($equipments->getUrlRange(1, $equipments->lastPage()) as $page => $url)
                @if ($page == $equipments->currentPage())
                    <span class="px-3 py-1 bg-blue-600 text-white rounded">{{ $page }}</span>
                @else
                    <a href="{{ $url }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">{{ $page }}</a>
                @endif
            @endforeach

            <!-- Next Page Link -->
            @if ($equipments->hasMorePages())
                <a href="{{ $equipments->nextPageUrl() }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600">Next</a>
            @else
                <span class="px-3 py-1 bg-gray-200 text-gray-500 rounded cursor-not-allowed">Next</span>
            @endif
        </div>
    </div>
    @endif

    <!-- Separator line -->
    <hr class="my-12 border-t-2 border-gray-600">

    <!-- Equipment List Section -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Equipment List</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-blue-100 text-gray-700 text-left text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Room Code</th>
                        <th class="py-3 px-4 border-b">Capacity</th>
                        <th class="py-3 px-4 border-b">Start Time</th>
                        <th class="py-3 px-4 border-b">End Time</th>
                        <th class="py-3 px-4 border-b text-center">Equip List</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @foreach ($equipments as $room)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $room->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_code }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->capacity }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->start_time }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->end_time }}</td>
                            <td class="py-3 px-4 border-b">
                                <div class="flex flex-col items-center space-y-1">
                                    @foreach($room->equipment as $equipment)
                                        <span class="w-full bg-gray-100 rounded px-2 py-1 text-xs font-semibold text-gray-700 text-center">
                                            {{ $equipment->equipment_name }} ({{ $equipment->quantity }})
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection