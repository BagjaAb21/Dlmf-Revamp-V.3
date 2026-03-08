<?php
// FILE: app/Http/Middleware/StudentMiddleware.php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (!$user || $user->role !== 'siswa') {
            // Jika admin nyasar ke panel siswa, redirect ke panel admin
            if ($user?->role === 'admin') {
                return redirect('/admin');
            }

            abort(403, 'Akses hanya untuk siswa terdaftar.');
        }

        return $next($request);
    }
}
