<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                $rol = auth()-> user()->Rol_id_rol;

                if($rol == 1){
                    return redirect()->intended(RouteServiceProvider::HOME_ADMIN);
                }
                elseif($rol == 2){
                    return redirect()->intended(RouteServiceProvider::HOME_VENDE);
                }
                elseif($rol == 3){
                    return redirect()->intended(RouteServiceProvider::HOME_BODEG);
                }
                
                // return redirect(RouteServiceProvider::HOME);
            }
        }

        return $next($request);
    }
}
