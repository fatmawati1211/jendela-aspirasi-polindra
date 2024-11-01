<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // Pastikan Anda memiliki view untuk login
    }

    public function store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika berhasil, periksa peran pengguna
            $user = Auth::user();

            if ($user->isAdmin) { // Pastikan `isAdmin` adalah atribut yang memeriksa peran admin
                return redirect()->route('admin.dashboard'); // Arahkan admin ke dashboard admin
            } else {
                return redirect()->route('dashboard'); // Arahkan user biasa ke dashboard user
            }
        }

        // Jika gagal, kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password tidak cocok.',
        ]);
    }
}
