@extends('layout.user')

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white rounded shadow">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">User Booking Status Page</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-semibold text-center">
            {{ session('success') }}
        </div>
    @endif

    {{--@foreach ($bookings as $booking)--}}
        <div class="mb-6 p-4 border rounded bg-gray-50">
            <div class="mb-2 flex">
                <span class="font-semibold w-40">User ID:</span>
                {{--<span>{{ $booking->user_id }}</span>--}}
            </div>

            <div class="mb-2 flex">
                <span class="font-semibold w-40">Room ID:</span>
                {{--<span>{{ $booking->room_id }}</span>--}}
            </div>

            <div class="mb-2 flex">
                <span class="font-semibold w-40">Start Time:</span>
              {{-- -  <span>{{ $booking->start_time }}</span>--}} 
            </div>

            <div class="mb-2 flex">
                <span class="font-semibold w-40">End Time:</span>
               {{--<span>{{ $booking->end_time }}</span>--}} 
            </div>

            <div class="mb-2 flex">
                <span class="font-semibold w-40">Participants:</span>
               {{--<span>{{ $booking->participant }}</span>--}}
            </div>

            <div class="mb-2 flex">
                <span class="font-semibold w-40">Meeting Agenda:</span>
                {{--<span>{{ $booking->agenda }}</span>--}}
            </div>

            <div class="flex">
                <span class="font-semibold w-40">Status:</span>
                <span class="
                    {{-- @if($booking->status == 'Approved') text-green-600 font-bold--}}
                    {{--@elseif($booking->status == 'Rejected') text-red-600 font-bold--}}
                   {{--   @elseif($booking->status == 'Cancel') text-orange-500 font-bold--}}
                    @else text-blue-600 font-bold
                    @endif
                ">
                    {{--{{ $booking->status ?? 'Pending' }}--}}
                </span>
            </div>
        </div>
    @endforeach

    <div class="text-center mt-6">
        <a href="{{ url('/status-approval') }}">
            <button class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded">
                Back to Bookings List
            </button>
        </a>
    </div>
</div>
@endsection
