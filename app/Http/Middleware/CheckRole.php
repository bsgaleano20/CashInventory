<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roleIds)
    {
        // Obtiene el usuario autenticado
        $user = Auth::user();

        // Verifica si el usuario está autenticado y si el ID de su rol está en la lista de IDs de roles permitidos
        if ($user && in_array($user->Rol_id_rol, $roleIds)) {
            // Si el usuario tiene el rol adecuado, permite continuar con la solicitud
            return $next($request);
        }

        // Si el usuario no tiene el rol adecuado, redirige a la página principal
        return redirect('/error401'); // Puedes cambiar esta URL según tus necesidades
    }
}
