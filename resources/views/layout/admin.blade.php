<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MRMS ADMIN</title>

    <!-- Vite CSS and JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="font-sans bg-gray-100">

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 w-56 bg-blue-700 text-white h-full p-5 transition-all duration-300">
        <h2 class="text-center text-white mb-6 text-xl">MRMS ADMIN</h2>
        <a href="{{ route('admin.dashboard') }}" class="block py-3 px-4 text-lg hover:bg-blue-600 {{ Request::routeIs('admin.dashboard') ? 'bg-blue-800' : '' }}">Dashboard</a>
        <a href="{{ route('meetingroom.dashboard') }}" class="block py-3 px-4 text-lg hover:bg-blue-600 {{ Request::routeIs('meetingroom.dashboard') ? 'bg-blue-800' : '' }}">Meeting Room</a>
        <a href="#" class="block py-3 px-4 text-lg hover:bg-blue-600 {{ Request::routeIs('') ? 'bg-blue-800' : '' }}">Equipment</a>
        <form action="{{ route('logout') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="w-full py-2 bg-white text-blue-700 border border-blue-700 rounded-md hover:bg-gray-200 transition-all">Logout</button>
        </form>
    </div>

    <!-- Content Area -->
    <div class="content ml-56 p-6 min-h-screen bg-gray-50">
        @yield('content')  <!-- This will display content from child views -->
    </div>

</body>
</html>
