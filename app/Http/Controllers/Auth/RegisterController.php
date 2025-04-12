<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{

    // Show the register form
    public function show()
    {
        return view('auth.register');
    }

    // Handle register form submission
    public function register(Request $request)
    {
        // Step 1: Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Step 2: Create the user
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password), // never save plain password
        ]);

        // Step 3: Redirect (you can also log the user in if you want)
        return redirect()->route('dashboard')->with('success', 'Welcome! You are now registered.');
    }
}

