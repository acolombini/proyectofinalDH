<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class administrador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() != null && Auth::user()->tipo_de_usuario_id != 2) {
            return redirect()->route('home');
        }
        return $next($request);
    }
}
