<?php

namespace App\Http\Middleware;

use Closure;

class WeAuth
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
         redirect(config('setting.wechat_url').'/oauth_wechat?redirectUrl=work_order_shopowner');
    }
}
