<?php

namespace App\Http\Middleware;

use Closure;

class SafeValidate
{
    /**
     * 说明: 安全验证
     *
     * @param $request
     * @param Closure $next
     * @return \Illuminate\Http\JsonResponse|mixed
     * @author 罗振
     */
    public function handle(
        $request,
        Closure $next
    )
    {






        return $next($request);
    }
}
