<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRMS</title>

    <!-- Vite CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans bg-gray-100">

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 w-56 bg-green-700 text-white h-full p-5 transition-all duration-300">
        <h2 class="text-center text-white mb-6 text-xl">MRMS</h2>

        <a href="#"
            class="block py-3 px-4 text-lg hover:bg-green-600 {{ Request::routeIs('dashboard') ? 'bg-green-800' : '' }}">Dashboard</a>

        <a href="{{ route('book.booking') }}"
            class="block py-3 px-4 text-lg hover:bg-green-600 {{ Request::routeIs('book.booking') ? 'bg-green-800' : '' }}">Booking</a>

        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit"
                class="w-full py-2 bg-white text-green-700 border border-green-700 rounded-md hover:bg-gray-200 transition-all">Logout</button>
        </form>
    </div>

    <!-- Content Area -->
    <div class="content ml-56 p-6 min-h-screen bg-gray-50">
        @yield('content')
    </div>

</body>

