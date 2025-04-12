<!DOCTYPE html>
<html>

<head>
    <title>Status Approval (User Page)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .success {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        .booking-container {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }

        .booking-field {
            margin-bottom: 12px;
            display: flex;
        }

        .booking-label {
            font-weight: bold;
            width: 120px;
        }

        .status-approved {
            color: green;
            font-weight: bold;
        }

        .status-rejected {
            color: red;
            font-weight: bold;
        }

        .status-cancel {
            color: orange;
            font-weight: bold;
        }

        .status-pending {
            color: blue;
            font-weight: bold;
        }

        /* For smaller screens */
        @media (max-width: 600px) {
            .booking-field {
                flex-direction: column;
            }
            
            .booking-label {
                width: 100%;
                margin-bottom: 3px;
            }
        }
    </style>
</head>

<body>

    <h2>User Booking Status Page</h2>

    @if (session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @foreach ($bookings as $booking)
        <div class="booking-container">
            <div class="booking-field">
                <div class="booking-label">User_ID:</div>
                <div>{{ $booking->user_id }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">Room_ID:</div>
                <div>{{ $booking->room_id }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">Start_time:</div>
                <div>{{ $booking->start_time }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">End_time:</div>
                <div>{{ $booking->end_time }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">Participant:</div>
                <div>{{ $booking->participant }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">Meeting Agenda:</div>
                <div>{{ $booking->agenda }}</div>
            </div>
            
            <div class="booking-field">
                <div class="booking-label">Status:</div>
                <div class="
                    @if($booking->status == 'Approved') status-approved
                    @elseif($booking->status == 'Rejected') status-rejected
                    @elseif($booking->status == 'Cancel') status-cancel
                    @else status-pending
                    @endif
                ">
                    {{ $booking->status ?? 'Pending' }}
                </div>
            </div>
        </div>
    @endforeach

    <!-- Fixed the route error by using url() instead of route() -->
    <div style="text-align: center; margin-top: 20px;">
        <a href="{{ url('/status-approval') }}" style="text-decoration: none;">
            <button style="padding: 10px 15px; background-color: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Back to Bookings List
            </button>
        </a>
    </div>

</body>

</html>