<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class AdminMiddleware
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
        if( $request->user()->rols_fk == '1' || $request->user()->rols_fk == '2' || $request->user()->rols_fk == '3'){
            return $next($request);
            //return redirect()->guest(route('admin'));
        }
        return new Response(view('home'));
        //return redirect()->guest(route('admin'));
        
    }
}
