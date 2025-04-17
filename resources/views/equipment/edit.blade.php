@extends('layout.admin')

@section('content')
<div class="max-w-4xl mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg border-2 border-gray-300">
    <h2 class="text-2xl font-semibold text-center mb-6">
        Edit Equipment in {{ $room->room_name }}
    </h2>

    @if ($errors->any())
        <div class="mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form 
        action="{{ isset($isBulk) && $isBulk ? route('equipment.update.multiple', $room->id) : route('equipment.update', $equipment->id ?? '') }}" 
        method="POST">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            @if(isset($isBulk) && $isBulk)
                <div class="grid grid-cols-12 gap-4 font-medium border-b-2 border-gray-300 pb-2 mb-2">
                    <div class="col-span-6">Equipment</div>
                    <div class="col-span-2">Quantity</div>
                    <div class="col-span-3">Status</div>
                    <div class="col-span-1">Action</div>
                </div>

                @foreach ($equipments as $index => $equipment)
                    <div class="grid grid-cols-12 gap-4 items-center py-2 {{ !$loop->last ? 'border-b border-gray-200' : '' }}">
                        <div class="col-span-6">
                            <input type="text" value="{{ $equipment->equipment_name }}" disabled
                                   class="w-full bg-gray-100 border border-gray-300 p-2 rounded">
                            <input type="hidden" name="equipments[{{ $index }}][id]" value="{{ $equipment->id }}">
                        </div>

                        <div class="col-span-2">
                            <input type="number" name="equipments[{{ $index }}][quantity]" value="{{ $equipment->quantity }}"
                                   min="1" required
                                   class="w-full border border-gray-300 p-2 rounded">
                        </div>

                        <div class="col-span-3">
                            <select name="equipments[{{ $index }}][status]" required
                                    class="w-full border border-gray-300 p-2 rounded">
                                <option value="Available" {{ $equipment->status == 'Available' ? 'selected' : '' }}>Available</option>
                                <option value="In Use" {{ $equipment->status == 'In Use' ? 'selected' : '' }}>In Use</option>
                                <option value="Maintenance" {{ $equipment->status == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>

                        <div class="col-span-1 flex justify-center">
                            <button type="button" onclick="deleteEquipment({{ $equipment->id }})" class="text-red-600 hover:text-red-800 transition" title="Delete">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7h6m2 0a1 1 0 00-1-1h-1.586a1 1 0 01-.707-.293l-.707-.707A1 1 0 0012.586 4h-1.172a1 1 0 00-.707.293l-.707.707A1 1 0 0110.586 6H9a1 1 0 00-1 1z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            @else
                <input type="hidden" name="meeting_room_id" value="{{ $room->id }}">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Equipment Name</label>
                        <input type="text" name="equipment_name" value="{{ old('equipment_name', $equipment->equipment_name) }}"
                               class="w-full border border-gray-300 p-2 rounded" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity', $equipment->quantity) }}"
                               class="w-full border border-gray-300 p-2 rounded" min="1" required>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" required
                                class="w-full border border-gray-300 p-2 rounded">
                            <option value="Available" {{ $equipment->status === 'Available' ? 'selected' : '' }}>Available</option>
                            <option value="In Use" {{ $equipment->status === 'In Use' ? 'selected' : '' }}>In Use</option>
                            <option value="Maintenance" {{ $equipment->status === 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                        </select>
                    </div>
                </div>
            @endif
        </div>

        <div class="flex justify-start mt-6 space-x-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-md">
                Save
            </button>
            <a href="{{ route('equipment.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md">
                Back
            </a>
        </div>
    </form>

    <!-- Hidden Delete Form -->
    <form id="delete-form" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
</div>

<script>
function deleteEquipment(id) {
    if (confirm('Are you sure you want to delete this equipment?')) {
        const form = document.getElementById('delete-form');
        form.action = `/equipment/${id}`;
        form.submit();
    }
}
</script>
@endsection