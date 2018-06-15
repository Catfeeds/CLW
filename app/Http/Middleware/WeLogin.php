<?php

namespace App\Http\Middleware;

use Closure;

class WeLogin
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
        $app = app('wechat');
        $response = $app->oauth->scopes(['snsapi_userinfo'])->redirect();
        return $response;
    }
}
