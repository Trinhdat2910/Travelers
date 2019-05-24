<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class EmployeeLoginMiddleware
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
            if(Auth::user()-> level == 2){

               return $next($request); 
            }
            else{
                return redirect('/error_truycapNV');
            }
        }
        else{
            return redirect()->back();
        }
    }
}
