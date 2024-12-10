<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;

class VerifyPinOrAccount
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user sudah login, lanjutkan
        if (auth()->check()) {
            return $next($request);
        }

        // Jika PIN sudah terverifikasi di session, lanjutkan
        if (Session::has('verified_pin')) {
            return $next($request);
        }

        // Redirect ke halaman verifikasi PIN jika belum
        return redirect()->route('verify.pin')->with('error', 'Masukkan PIN atau login terlebih dahulu.');
    }
}
