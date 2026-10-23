<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/** Protege las rutas /admin: solo pasa quien tenga rol "admin". */
class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_unless($request->user()?->isAdmin(), 403, 'No tienes permisos para entrar al panel de administración.');

        return $next($request);
    }
}
