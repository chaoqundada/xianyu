<?php

namespace App\Http\Middleware;

use Closure;

class Adminlogin
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
        if(!session('user'))
        {
            return redirect('/admin/login/login');
        }
        return $next($request);
    }
}