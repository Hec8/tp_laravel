<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
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
        $user = Auth::user();

        // Vérifiez si l'utilisateur est authentifié et s'il a le rôle requis
        if (!$user || $user->role !== $role) {
            abort(403, 'Accès non autorisé.');
        }

        return $next($request);
    }
}
