<?php

namespace App\Http\Middleware;

use Closure;

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
        $user = session('user');

        if (empty($user)) return redirect('/logins/create');

        return $next($request);
    }
}
