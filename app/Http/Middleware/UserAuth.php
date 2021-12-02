<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->path()=="login_register" && $request->session()->has('user'))
        {
            return redirect('myaccount');
        }
        
        if($request->path()=="cart" && $request->session()->has('user'))
        {
             return redirect('cart');
        }
        
        if($request->path()=="wishlist" && $request->session()->has('user'))
        {
             return redirect('wishlist');
        }
        
        return $next($request);
    }
}