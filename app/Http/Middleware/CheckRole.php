<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $roles    = Cache::get('roles');

        $userRoleId = auth()->user()->role_id;
        $roleId = $roles[$role] ?? -1;

        if($roleId !== $userRoleId)
            abort(403);

        return $next($request);
    }
}
