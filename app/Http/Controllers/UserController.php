<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function softDelete($id)
    {
        // Find the user by ID
        $user = User::find($id);

        // Check if user exists
        if ($user) {
            $user->activeStatus = 'deleted'; // Update the status
            $user->save(); // Save the changes
            return redirect()->route('user.list')->with('success', 'User status updated to deleted!'); // Redirect to user list
        }

        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }


    public function showUserList()
    {
        // Retrieve only active users
        $users = User::where('activeStatus', 'active')->get();
        return view('auth.view', compact('users'));
    }


    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function showAdminDashboard()
    {
        return view('dashboardA');
    }

    public function showUserDashboard()
    {
        return view('dashboardU');
    }

    public function logingIn(Request $request)
    {
        // Validate the login request
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();

            // Check user status for redirection
            if ($user->status === 'user') {
                return redirect()->route('dashboard.user'); // Ensure this route exists
            } elseif ($user->status === 'admin') {
                return redirect()->route('dashboard.admin'); // Ensure this route exists
            }
        }

        // If authentication fails, redirect back with an error message
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function register(Request $request)
    {
        // Validate the registration request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        // Create a new user instance
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        // Redirect to the appropriate dashboard based on user status
        return redirect()->route($user->status === 'user' ? 'dashboard.user' : 'dashboard.admin')->with('success', 'Registration successful!');
    }
}
