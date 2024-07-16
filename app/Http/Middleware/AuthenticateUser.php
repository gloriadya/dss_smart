<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateUser
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            return $next($request);
        }

        // Jika pengguna belum masuk, arahkan ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus masuk untuk mengakses halaman ini.');
    }
}