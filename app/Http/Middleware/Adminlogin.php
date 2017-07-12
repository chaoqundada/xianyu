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
        if(!session('admin_user'))
        {
            return redirect('/admin/login/login')->with('error','请先登录!');
        }
        return $next($request);
    }
}
