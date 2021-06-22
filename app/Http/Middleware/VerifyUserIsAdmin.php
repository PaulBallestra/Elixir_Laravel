<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyUserIsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(!$request->user()->is_admin){
            return redirect('/');
        }

        return $next($request);
    }
}
