<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class WeChatLogin
{
    /**
     * 说明: 登录验证
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     * @author 罗振
     */
    public function handle($request, Closure $next)
    {
        cookie('aa','bb',30,'/');


//        dd(cookie('aa'));

        dd(Cookie::get('aa'));




        return $next($request);
    }
}
