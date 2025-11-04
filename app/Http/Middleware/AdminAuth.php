<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah 'admin_id' ada di session
        if (! $request->session()->has('admin_id')) {
            // Jika tidak ada, paksa kembali ke halaman login admin
            return redirect()->route('admin.login.form');
        }

        // Jika ada, izinkan lanjut
        return $next($request);
    }
}
