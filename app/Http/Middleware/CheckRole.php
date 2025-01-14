<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Periksa role_id pengguna
        $user = Auth::user();
        if ($user->role_id != $role) {
            return response()->view('errors.403', [], 403); // Tampilkan halaman 403 jika akses ditolak
        }

        return $next($request);
    }
}
