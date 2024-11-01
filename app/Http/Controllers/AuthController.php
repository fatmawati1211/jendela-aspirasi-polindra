<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('dashboard');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Menampilkan halaman registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'nim' => 'nullable|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'role' => 'required|string|in:user,admin', // Validasi role
        ]);

        User::create([
            'nim' => $request->nim,  // Menyimpan nilai nim
            'nidn' => $request->nidn,  // Menyimpan nilai nidn
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role, // Menyimpan role
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
