<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Ambil role_code dari session
        $sessionRole = session('role_code');
        // 2. Cek apakah user sudah login dan session role ada dalam daftar yang diizinkan
        if (!$sessionRole || !in_array($sessionRole, $roles)) {
            
            // Jika request via AJAX (Axios/DataTable), kirim respon JSON
            if ($request->ajax()) {
                return response()->json(['message' => 'Unauthorized.'], 403);
            }

            // Jika akses biasa, redirect ke dashboard dengan pesan error
            return redirect()->route('dashboard')->with('error', 'Anda tidak memiliki akses ke halaman tersebut.');
        }
        return $next($request);
    }
}
