<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Meeting Room</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .booking-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
        }
        .form-group {
            margin-bottom: 15px;
            width: 100%;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
        }
        .date-container {
            display: flex;
            gap: 10px;
        }
        .date-picker {
            flex-grow: 1;
        }
        .calendar-icon {
            width: 40px;
            height: 38px;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            border-radius: 4px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }
        .save-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            margin-top: 10px;
        }
        .save-btn:hover {
            background-color: #45a049;
        }
        h2 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="booking-container">
        <h2>Book Meeting Room: {{ $room->room_name }}</h2>
        
        <form action="{{ route('meeting-rooms.book', $room->room_id) }}" method="POST">
            @csrf
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Booking Date" name="booking_date" required>
            </div>
            
            <div class="form-group date-container">
                <input type="text" class="form-control date-picker" placeholder="Enter Booking Date" name="booking_date_alt" required>
                <div class="calendar-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                    </svg>
                </div>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Time" name="booking_time" required>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter participant" name="participants" required>
            </div>
            
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Agenda" name="agenda" required>
            </div>
            
            <button type="submit" class="save-btn">Save</button>
        </form>
    </div>
</body>
</html>
