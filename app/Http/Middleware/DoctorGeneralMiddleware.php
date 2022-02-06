<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class DoctorGeneralMiddleware
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
        if($request->user()->rols_fk == '1' || $request->user()->rols_fk == '2'){
            return $next($request);
        }
        return new Response(view('home'));
    }
}
