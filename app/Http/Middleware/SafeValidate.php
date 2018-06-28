<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Crypt;

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
//            $temp = Crypt::decryptString('eyJpdiI6IjQzeHJIbjhnMmVncXRlZ1dEbml2K2c9PSIsInZhbHVlIjoiUm1yV3FYcnRIeWtIWEdPdXdKVVErTDduK2RYVVFldGFFcVJYNzhseEFURT0iLCJtYWMiOiI3M2IxZjdhM2Y2MmFkNjBiZTEyN2IyMDdhOWYwZWM5NzczY2ZjZWQxMGVkNjQ3MGZiNGIwNjYxOTM5OTkyZjFhIn0=');
        if (Crypt::decryptString($request->safeString) != 'chulouwang'.date('Y-m-d',time())) {
            return response()->json(["message" => "认证失败"], 401);
        }

        return $next($request);
    }
}
