<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class WebGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // echo "Hello";

        // echo $request->age;

        // if($request->age < 18){
        //     echo "You're not allow to access the page";
        //     die;
        // }

        // echo "<pre>";
        // print_r(session()->all());
        // die;

        if(session()->has('user_id')){
            return $next($request);
        }else{
            return redirect('no-access');
        }

        
    }
}
