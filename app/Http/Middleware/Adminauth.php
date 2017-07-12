<?php

namespace App\Http\Middleware;

use Closure;

class Adminauth
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

        if(session('admin_user')['auth']!=2)
        {
            return back()->with('error','权限不够哦!');
        }
        return $next($request);
    }
}
