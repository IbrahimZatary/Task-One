<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // handle main Middleware function  > handle the request come & what next ? continue into destination
    
    public function handle(Request $request, Closure $next)
    {
        
    
        $role = session('role');

        //  No role or guest → always guest page
        if (!$role || $role === 'guest') {
            return redirect('/guest');
        }
    
        //  Super admin → full access
        if ($role === 'super_admin') {
            return $next($request);
        }
    
        //  Admin → ONLY categories.index
        if ($role === 'admin') {
    
            if ($request->route()->getName() === 'categories.index') {
                return $next($request);
            }
    
            abort(403, 'Admins can only view categories');
        }
    
        // 4️⃣ Safety fallback
        abort(403);
    }



        // if ($role !== 'admin') {
        //     return redirect('/guest'); // 
        // }

        // role is admin ? continue the flow 
        // return $next($request);
    }

