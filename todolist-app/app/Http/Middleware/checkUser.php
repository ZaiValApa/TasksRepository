<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkUser
{
    public function handle(Request $request, Closure $next, ...$users): Response
    {
        if ($request->user()) {
        } else {
            // user is not logged in
        }

        return $next($request);
    }
}
