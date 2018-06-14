<?php

namespace App\Http\Middleware;

use Closure;

class Certified
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
        $response = $app->outh->scopes(['snsapi_userinfo'])->redirect();
        return $next($request);
    }
}
