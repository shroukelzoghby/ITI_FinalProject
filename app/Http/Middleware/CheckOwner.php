<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ownerId = $request->route()->parameter('user');
        $userId  = strval(auth()->id());

        $isOwner = $userId === $ownerId || is_admin();

        if(!$isOwner)
            abort(403);

        return $next($request);
    }
}
