<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (! $request->session()->get('admin_authenticated')) {
            return redirect()
                ->route('admin.login')
                ->with('error', 'Veuillez vous connecter pour accéder à l\'espace admin.');
        }

        return $next($request);
    }
}
