<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Check on session == 
        if (!session()->has('user_name') || session('user_role') !== 'ibraheem') {
            abort(404);
        }

        return $next($request);
    }
}