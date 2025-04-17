@extends('layout.admin')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-semibold text-blue-700 mb-4">Choose a Room</h2>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white border-collapse">
            <thead>
                <tr class="bg-blue-100 text-gray-700 text-left text-sm">
                    <th class="py-3 px-4 border-t border-b border-l border-gray-300">No</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Room Name</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Room Code</th>
                    <th class="py-3 px-4 border-t border-b border-gray-300">Capacity</th>
                    <th class="py-3 px-4 border-t border-b border-r border-gray-300 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-700">
                @foreach ($rooms as $index => $room)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b border-l border-gray-300">{{ $rooms->firstItem() + $index }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->room_name }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->room_code }}</td>
                        <td class="py-3 px-4 border-b border-gray-300">{{ $room->capacity }}</td>
                        <td class="py-3 px-4 border-b border-r border-gray-300 text-center">
                            <a href="{{ route('equipment.create', ['room_id' => $room->id]) }}"
                            class="px-6 py-2 bg-indigo-600 text-white rounded-lg shadow hover:bg-indigo-700 transition duration-150">
                                Add Equipment
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Rooms Pagination --}}
    <div class="mt-4">
        {{ $rooms->appends(['equipment_page' => request('equipment_page')])->links() }}
    </div>

    <hr class="my-12 border-t-2 border-gray-600">

    <!-- Equipment List Section -->
    <div class="mt-12">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4">Equipment List</h2>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded shadow">
                {{ session('success') }}
            </div>
        @endif
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow">
                <thead class="bg-blue-100 text-gray-700 text-left text-sm">
                    <tr>
                        <th class="py-3 px-4 border-b">No</th>
                        <th class="py-3 px-4 border-b">Room Name</th>
                        <th class="py-3 px-4 border-b">Room Code</th>
                        <th class="py-3 px-4 border-b">Equip List</th>
                        <th class="py-3 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-sm text-gray-700">
                    @php $eqNumber = $equipments->firstItem(); @endphp
                    @foreach ($equipments as $room)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4 border-b">{{ $eqNumber++ }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_name }}</td>
                            <td class="py-3 px-4 border-b">{{ $room->room_code }}</td>
                            <td class="py-3 px-4 border-b">
                                <div class="flex flex-col space-y-1">
                                    @foreach($room->equipment as $equipment)
                                        <span class="bg-gray-100 rounded px-2 py-1 text-xs font-semibold text-gray-700">
                                            {{ $equipment->equipment_name }} ({{ $equipment->quantity }} - {{ $equipment->status }})
                                        </span>
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-3 px-4 border-b">
                                <div class="flex space-x-2">
                                    <a href="{{ route('equipment.edit.multiple', $room->id) }}"  
                                    class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 text-sm transition-colors">
                                        Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Equipment Pagination --}}
        <div class="mt-4">
            {{ $equipments->appends(['rooms_page' => request('rooms_page')])->links() }}
        </div>
    </div>
</div>
@endsection
