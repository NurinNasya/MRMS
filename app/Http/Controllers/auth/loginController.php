<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login'); // Make sure you have resources/views/auth/login.blade.php
    }

    // Handle login logic
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Regenerate session to prevent session fixation
            $request->session()->regenerate();

            // Get the authenticated user
            $user = Auth::user();

            // Check role and redirect accordingly
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'staff') {
                return redirect()->route('user.dashboard');
            }
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors([
            'email' => 'Invalid login credentials.',
        ]);
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();   // Invalidate session
        $request->session()->regenerateToken(); // Regenerate CSRF token
        return redirect('/login');
    }

    /*public function showLoginForm()
    {
        return view('auth.login');  // Your login page
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return $this->authenticated($request, Auth::user());
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    public function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('user.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }*/

        // Other methods...

    /**
     * After the user is authenticated, redirect them based on their role.
     */
    /*protected function authenticated(Request $request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('staff.dashboard');
    }

    // Your login method
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // Redirect based on role after successful login
            return $this->authenticated($request, Auth::user());
        }

        return back()->withErrors(['email' => 'Invalid login credentials.']);
    }

    // Logout function (optional)
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }*/
}
