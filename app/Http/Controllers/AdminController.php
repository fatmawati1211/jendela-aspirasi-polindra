<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin_dashboard'); // Nama file sesuai yang diinginkan
    }
}