<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Count users with the role 'user'
        $userCount = User::where('role', 'user')->count();

        // Return the view with the user count data
        return view('home', compact('userCount'));
    }
}