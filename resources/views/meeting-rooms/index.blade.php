<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Rooms</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .book-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 4px;
        }
        .book-btn:hover {
            background-color: #45a049;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h2>Meeting Room</h2>
    <table>
        <thead>
            <tr>
                <th>Room Id</th>
                <th>Capacity</th>
                <th>Room Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($meetingRooms as $room)
            <tr>
                <td>{{ $room->room_id }}</td>
                <td>{{ $room->capacity }}</td>
                <td>{{ $room->room_name }}</td>
                <td>{{ $room->status }}</td>
                <td>
                    <a href="{{ route('meeting-rooms.book', $room->room_id) }}" class="book-btn">Book</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

