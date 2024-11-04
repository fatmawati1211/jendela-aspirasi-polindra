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
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencoba login dengan email dan password
        if (Auth::attempt($request->only('email', 'password'))) {
            // Cek peran pengguna
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
            } 
        }

        // Mencoba login dengan email dan password
        if (Auth::attempt($request->only('email', 'password'))) {
            // Cek peran pengguna
            if (Auth::user()->role === 'user') {
                return redirect()->route('dashboard'); // Redirect ke dashboard user
            }
        }

        // Kembali dengan error jika login gagal
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
        // Validasi input untuk registrasi
        $request->validate([
            'nim' => 'nullable|string|max:255',
            'nidn' => 'nullable|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
            'role' => 'required|string|in:user,admin', // Validasi role
        ]);

        // Membuat user baru
        User::create([
            'nim' => $request->nim,  
            'nidn' => $request->nidn,  
            'email' => $request->email,
            'password' => Hash::make($request->password), // Enkripsi password
            'role' => $request->role, // Menyimpan role
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Logout
    public function logout()
    {
        Auth::logout(); // Logout pengguna
        return redirect('/login'); // Redirect ke halaman login
    }
}
