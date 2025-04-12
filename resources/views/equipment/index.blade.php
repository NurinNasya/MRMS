<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipment List</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <div class="container mx-auto p-4">
        <!-- Title at top-left -->
        <h1 class="text-3xl font-bold mb-2">🛠️ Equipment List</h1>

        <!-- Search Bar -->
        <form action="{{ route('equipment.index') }}" method="GET" class="flex max-w-md mb-4">
            <input type="text" name="search" placeholder="Search..."
                value="{{ request('search') }}"
                class="w-full border border-gray-300 px-3 py-2 rounded-l focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded-r hover:bg-blue-700">
                Search
            </button>
        </form>

        <!-- Button on next line, right-aligned -->
        <div class="flex justify-end mb-4">
            <a href="{{ route('equipment.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                Add Equipment
            </a>
        </div>

        <table class="w-full text-left border-collapse shadow-sm">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="p-2">NO</th>
                    <th class="p-2">EQUIPMENT ID</th>
                    <th class="p-2">EQUIPMENT NAME</th>
                    <th class="p-2">QUANTITY</th>
                    <th class="p-2">ROOM</th>
                    <th class="p-2">STATUS</th>
                    <th class="p-2">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach($equipments as $index => $equipment)
                    @php
                        $status = $equipment->status;
                        $bgColor = 'bg-red-100';
                        $textColor = 'text-red-800';

                        if ($status == 'Available') {
                            $bgColor = 'bg-green-100';
                            $textColor = 'text-green-800';
                        } elseif ($status == 'Under Maintenance') {
                            $bgColor = 'bg-yellow-100';
                            $textColor = 'text-yellow-800';
                        }
                    @endphp
                    <tr class="border-b bg-white">
                        <td class="p-2">{{ $loop->iteration }}</td>
                        <td class="p-2">{{ $equipment->equipment_id }}</td>
                        <td class="p-2">{{ $equipment->equipment_name }}</td>
                        <td class="p-2">{{ $equipment->quantity }}</td>
                        <td class="p-2">{{ $equipment->room }}</td>
                        <td class="p-2">
                            <span class="px-2 py-1 rounded-full text-sm {{ $bgColor }} {{ $textColor }}">
                                {{ $equipment->status }}
                            </span>
                        </td>
                        <td class="p-2">
                            <!-- Edit Button -->
                            <a href="{{ route('equipment.edit', $equipment->id) }}" class="bg-yellow-400 px-3 py-1 rounded text-white">Edit</a>

                            <!-- Delete Button -->
                            <form action="{{ route('equipment.destroy', $equipment->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
