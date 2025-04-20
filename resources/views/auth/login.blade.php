{{--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-gray-100">

    <!-- Centered container for login form -->
    <div class="flex items-center justify-center min-h-screen pt-24 px-4">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">

            <!-- Heading -->
            <div class="text-center mb-6">
                <h1 class="text-4xl font-semibold text-blue-600">MRMS</h1>
            </div>

            <!-- Login Form Container -->
            <div class="bg-white rounded-lg shadow-md">
                <div class="bg-gray-200 text-lg font-semibold py-2 px-4 rounded-t-lg">{{ __('Login') }}</div>

                <!-- Form Area -->
                <div class="p-6">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Input Field -->
                        <div class="mb-6">
                            <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                            <input id="email" type="email" class="mt-1 block w-full p-3 border border-gray-300 rounded-md @error('email') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-400" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="text-red-500 text-sm mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input Field -->
                        <div class="mb-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                            <input id="password" type="password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md @error('password') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-400" name="password" required autocomplete="current-password">

                            @error('password')
                                <span class="text-red-500 text-sm mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Role Selection (Admin or Staff) -->
                        <div class="mb-6">
                            <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
                            <select id="role" name="role" class="mt-1 block w-full p-3 border border-gray-300 rounded-md @error('role') border-red-500 @enderror focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                                <option value="admin">{{ __('Admin') }}</option>
                                <option value="staff">{{ __('Staff') }}</option>
                            </select>

                            @error('role')
                                <span class="text-red-500 text-sm mt-1" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-6 flex items-center">
                            <input class="form-checkbox h-4 w-4 text-blue-600" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="remember" class="ml-2 text-sm text-gray-700">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <!-- Submit Button and Forgot Password Link -->
                        <div class="flex justify-between items-center">
                            <button type="submit" class="w-full py-3 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>--}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Tailwind CSS CDN -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-500">

    <!-- Centered container for login form -->
    <div class="flex items-center justify-center min-h-screen px-4 sm:px-6 lg:px-8">
        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-lg">

            <!-- Heading -->
            <div class="text-center mb-6">
                <h1 class="text-5xl font-semibold text-blue-600 tracking-tight">MRMS</h1>
                <p class="text-gray-500 mt-2 text-lg">Please sign in to your account</p>
            </div>

            <!-- Login Form -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="bg-gray-100 text-lg font-semibold py-2 px-4 rounded-t-lg text-blue-700">{{ __('Login') }}</div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Input -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                        <input id="email" type="email"
                               class="mt-2 block w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('email') border-red-500 @enderror"
                               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                        <input id="password" type="password"
                               class="mt-2 block w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 @error('password') border-red-500 @enderror"
                               name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-6">
                        <label for="role" class="block text-sm font-medium text-gray-700">{{ __('Role') }}</label>
                        <select id="role" name="role"
                                class="mt-2 block w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>
                            <option value="admin">{{ __('Admin') }}</option>
                            <option value="staff">{{ __('Staff') }}</option>
                        </select>

                        @error('role')
                        <span class="text-red-500 text-sm mt-1" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <!-- Remember Me Checkbox -->
                    <div class="mb-6 flex items-center">
                        <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" class="ml-2 text-sm text-gray-700">{{ __('Remember Me') }}</label>
                    </div>

                    <!-- Submit Button and Forgot Password Link -->
                    <div class="flex justify-between items-center">
                        <button type="submit"
                                class="w-full py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 transition-all">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <!-- Forgot Password Link -->
                    <div class="mt-4 text-center">
                        @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:text-blue-700" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center text-sm text-gray-500 mt-6">
                <p>&copy; 2025 MRMS. All rights reserved.</p>
            </div>
        </div>
    </div>

</body>

</html>




