<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class DoctoraDentalMiddleware
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
        if($request->user()->rols_fk == '1' || $request->user()->rols_fk == '3'){
            return $next($request);
        }
        return new Response(view('home'));
    }
}
