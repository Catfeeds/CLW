<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ApiAuth
{
    /**
     * 说明: 验证
     *
     * @param $request
     * @param Closure $next
     * @param null $guard
     * @return \Illuminate\Http\JsonResponse|mixed
     * @author 罗振
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (empty(Auth::guard($guard)->user())) {
            return response()->json(["message" => "Unauthenticated."], 401);
        }
        return $next($request);
    }
}
