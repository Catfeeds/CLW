<?php

namespace App\Http\Middleware;

use Closure;

class PcLogin
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
        //如果没有登录,则跳转到登录页面
        if (empty(session('user'))) {
            return redirect('logins');
        }
        return $next($request);
    }
}
