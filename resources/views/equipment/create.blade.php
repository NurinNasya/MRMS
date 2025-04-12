<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="max-w-lg mx-auto mt-10 p-6 bg-white shadow-md rounded-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Add New Equipment</h2>

        <form action="{{ route('equipment.store') }}" method="POST">
            @csrf

            <!-- Device ID -->
            <div class="mb-4">
                <label for="equipment_id" class="block font-medium">Equipment ID</label>
                <input type="text" name="equipment_id" id="equipment_id"
                       class="w-full border border-gray-300 p-2 rounded mt-1"
                       value="{{ old('equipment_id') }}" required>
                @error('equipment_id') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <!-- Device Name -->
            <div class="mb-4">
                <label for="equipment_name" class="block font-medium">Equipment Name</label>
                <input type="text" name="equipment_name" id="equipment_name"
                       class="w-full border border-gray-300 p-2 rounded mt-1"
                       value="{{ old('equipment_name') }}" required>
                @error('equipment_name') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <!-- Quantity -->
            <div class="mb-4">
                <label for="quantity" class="block font-medium">Quantity</label>
                <input type="number" name="quantity" id="quantity"
                       class="w-full border border-gray-300 p-2 rounded mt-1"
                       value="{{ old('quantity') }}" required>
                @error('quantity') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>
            
            <!-- Room -->
            <div class="mb-4">
                <label for="room" class="block font-medium">Room</label>
                <input type="text" name="room" id="room"
                    class="w-full border border-gray-300 p-2 rounded mt-1"
                    value="{{ old('room') }}" required>
                @error('room') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <!-- Status (Optional) -->
            <div class="mb-6">
                <label for="status" class="block font-medium">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status"
                        class="w-full border border-gray-300 p-2 rounded mt-1"
                        required>
                    <option value="" disabled selected>-- Select Status --</option>
                    <option value="Available" {{ old('status', $equipment->status ?? '') == 'Available' ? 'selected' : '' }}>Available</option>
                    <option value="In Use" {{ old('status', $equipment->status ?? '') == 'In Use' ? 'selected' : '' }}>In Use</option>
                    <option value="Under Maintenance" {{ old('status', $equipment->status ?? '') == 'Under Maintenance' ? 'selected' : '' }}>Under Maintenance</option>
                </select>
                @error('status') <small class="text-red-500">{{ $message }}</small> @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-between">
                <button type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-md">
                    Add
                </button>
                <a href="{{ route('equipment.index') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md">
                    Back
                </a>
            </div>
        </form>
    </div>

</body>
</html>
