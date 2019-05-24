<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(Auth::check()){
            if(Auth::user()-> level == 3){

               return $next($request); 
            }
            else{
                return redirect('/error_truycap');
            }
        }
        else{
            return redirect()->back();
        }
    }
}
