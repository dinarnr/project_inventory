<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekDivisi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle( $request, Closure $next, ...$divisi)
    {
        if(in_array($request->user()->divisi,$divisi)){
            return $next($request);
        }
        return redirect('/');
    }
}
