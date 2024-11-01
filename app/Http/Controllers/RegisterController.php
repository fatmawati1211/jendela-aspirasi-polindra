<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Cek apakah role adalah 'user' atau 'admin'
        if ($request->role === 'user') {
            // Validasi untuk user
            $request->validate([
                'nim' => 'required|string|max:20|unique:users,nim',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'nim' => $request->nim,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'user',
            ]);
        } else {
            // Validasi untuk admin
            $request->validate([
                'nidn' => 'required|string|max:20|unique:users,nidn',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $user = User::create([
                'nidn' => $request->nidn,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
            ]);
        }

        auth()->login($user);

        // Redirect sesuai role
        if ($request->role === 'admin') {
            return redirect()->route('admin.dashboard')->with('success', 'Admin registration successful!');
        } else {
            return redirect()->route('home')->with('success', 'Registration successful!');
        }
    }
}
