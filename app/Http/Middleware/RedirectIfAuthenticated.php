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

                // Obtener el usuario autenticado


        // Obtener el rol del usuario

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() ) {
                $user = Auth::user();
                $rol = $user->roles->first()->name; // Asumiendo que un usuario solo tenga un rol
                echo $rol;
                dd($rol);
                if ($rol == 'Administrador') {
                    return redirect(RouteServiceProvider::HOME);
                }
                return redirect(RouteServiceProvider::HOME_CLIENTE);
            }
        }

        return $next($request);
    }
}
