@extends('layout.user')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Tailwind via Vite --}}
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="bg-white p-10 rounded-xl shadow-lg text-center w-full max-w-md">
        <h1 class="text-3xl font-bold text-green-600">Welcome, User!</h1>
        <p class="text-gray-600 mt-3">You're in the user dashboard.</p>

        <form method="POST" action="{{ route('logout') }}" class="mt-6">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-lg">
                Logout
            </button>
        </form>
    </div>
</body>
</html>
@endsection