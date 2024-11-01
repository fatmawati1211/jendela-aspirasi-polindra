<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // Logika atau data untuk ditampilkan di halaman admin dashboard
        return view('admin_dashboard'); // Pastikan nama view sesuai
    }
}
