<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    protected function redirectTo()
    {
        if (Auth::user()->role === 'admin') {
            return route('admin.dashboard');
        } else {
            return route('dashboard');
        }
    }
    
}
