<?php

namespace App\Http\Middleware\Roles;

use App\Models\Manager;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagerController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user->userable_type !== Manager::class) {
            return abort(403, 'Anda tidak mempunyai akses.');
        }

        return $next($request);
    }
}
