<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    class User extends Authenticatable
    {
        // Kolom lainnya...

        // Jika menggunakan atribut boolean
        public function getIsAdminAttribute()
        {
            return $this->role === 'admin'; // Misalkan Anda menyimpan peran di kolom 'role'
        }
    }
}
