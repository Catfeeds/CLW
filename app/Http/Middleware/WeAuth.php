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
        $user = session('wechat_user');
        if (empty($user)) return redirect('/weLogin');
    }
}
