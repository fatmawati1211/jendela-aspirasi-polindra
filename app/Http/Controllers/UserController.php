<?php

// app/Http/Controllers/UserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userCount()
    {
        // Count users with the 'user' role
        $userCount = User::where('role', 'user')->count();

        return view('your-view-name', compact('userCount'));
    }
}
