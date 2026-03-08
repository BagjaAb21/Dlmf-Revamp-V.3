<?php

/**
 * FILE: app/Http/Middleware/EnsureUserIsSiswa.php
 *
 * Middleware auth tambahan untuk panel student.
 * Dipanggil setelah Filament's Authenticate middleware.
 * Jika user sudah login tapi role-nya bukan siswa → tolak.
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSiswa
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        // Sudah di-handle Authenticate middleware, tapi double-check
        if (!$user) {
            return redirect()->route('filament.student.auth.login');
        }

        // Jika admin nyasar ke panel siswa → redirect ke panel admin
        if ($user->role === 'admin') {
            return redirect()->route('filament.admin-minfara.pages.dashboard');
        }

        // Jika bukan siswa dan bukan admin (edge case)
        if ($user->role !== 'siswa') {
            abort(403, 'Akses ditolak.');
        }

        return $next($request);
    }
}
