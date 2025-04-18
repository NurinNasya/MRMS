{{--@extends('layout.user') 

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white shadow-md rounded-lg">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h6 class="text-lg font-semibold text-gray-800">View Booking Request</h6>
            <!-- Pencil Icon for Editing -->
            <a href="{{ route('book.edit', $booking->id) }}" class="text-gray-600 hover:text-gray-800">
                <!-- Heroicons Pencil Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 20h9M16.293 4.293a1 1 0 011.414 0l2.828 2.828a1 1 0 010 1.414L8.121 16.121a1 1 0 01-.29.194l-4.768 1.585a1 1 0 01-1.243-1.243l1.585-4.768a1 1 0 01.194-.29L16.293 4.293z"/>
                </svg>
            </a>
        </div>
        
        <div class="px-6 py-6">
            <!-- Display Booking Information -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Booking ID</label>
                    <p class="text-gray-900">{{ $booking->id }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Room ID</label>
                    <p class="text-gray-900">{{ $booking->room_id }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Start Time</label>
                    <p class="text-gray-900">{{ $booking->start_time }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">End Time</label>
                    <p class="text-gray-900">{{ $booking->end_time }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Participants</label>
                    <p class="text-gray-900">{{ $booking->participant }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <p class="px-3 py-1 inline-flex text-sm rounded-full 
                        @if($booking->status == 'approved') bg-green-100 text-green-800 
                        @elseif($booking->status == 'rejected') bg-red-100 text-red-800 
                        @elseif($booking->status == 'canceled') bg-gray-100 text-gray-800 
                        @else bg-yellow-100 text-yellow-800 @endif">
                        {{ ucfirst($booking->status) }}
                    </p>
                </div>
            </div>

            <div class="mb-6 mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Meeting Agenda</label>
                <p class="text-gray-900 border border-gray-200 rounded-md p-3 bg-gray-50">{{ $booking->agenda }}</p>
            </div>

            <!-- Button to navigate back -->
            <div class="mt-6">
                <a href="{{ route('book.booking') }}" class="bg-blue-600 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-300 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Back to Bookings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection--}}

@extends('layout.user')

@section('content')
<div class="max-w-4xl mx-auto py-10 px-6">
    <div class="bg-white shadow-xl rounded-2xl">
        <!-- Header -->
        <div class="bg-gradient-to-r from-green-500 to-green-700 px-6 py-4 flex items-center justify-between rounded-t-2xl">
                <h2 class="text-xl font-semibold text-white">Booking Details</h2>
                {{--<a href="{{ route('book.edit', $booking->id) }}" class="text-white hover:text-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 20h9M16.293 4.293a1 1 0 011.414 0l2.828 2.828a1 1 0 010 1.414L8.121 16.121a1 1 0 01-.29.194l-4.768 1.585a1 1 0 01-1.243-1.243l1.585-4.768a1 1 0 01.194-.29L16.293 4.293z" />
                    </svg>
                </a>--}}
            </div>

        <!-- Booking Info -->
        <div class="px-6 py-8 bg-gray-50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Dynamic Info -->
                <div>
                    <p class="text-sm text-gray-500">Booking ID</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Room ID</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->room_id }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Start Time</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->start_time }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">End Time</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->end_time }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Participants</p>
                    <p class="text-base font-medium text-gray-800">{{ $booking->participant }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Status</p>
                    <p class="inline-block px-3 py-1 text-sm rounded-full font-semibold
                        @if($booking->status == 'approved') bg-green-100 text-green-700
                        @elseif($booking->status == 'rejected') bg-red-100 text-red-700
                        @elseif($booking->status == 'canceled') bg-gray-200 text-gray-700
                        @else bg-yellow-100 text-yellow-700 @endif">
                        {{ ucfirst($booking->status) }}
                    </p>
                </div>
            </div>

            <!-- Agenda -->
            <div class="mt-8">
                <p class="text-sm text-gray-500 mb-1">Meeting Agenda</p>
                <div class="bg-white rounded-lg p-4 shadow-sm text-gray-800">
                    {{ $booking->agenda }}
                </div>
            </div>

            <!-- Back Button -->
            {{--<div class="mt-8">
                <a href="{{ route('book.booking') }}"
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to Bookings
                </a>
            </div>--}}
        </div>
    </div>
</div>
@endsection

