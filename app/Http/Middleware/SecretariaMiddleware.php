<?php

namespace App\Http\Middleware;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

use Closure;

class SecretariaMiddleware
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
        if($request->user() && $request->user()->rols_fk != '4'){
            return new Response(view('home'));
        }
        return $next($request);
    }
}
