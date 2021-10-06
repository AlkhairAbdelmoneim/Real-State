<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth; 

class IfIsAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->admin != 1) {
            
            return redirect('/');
            
        }else {

            return $next($request);
        }
        
    }
}
