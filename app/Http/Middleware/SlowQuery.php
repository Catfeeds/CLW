<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;

class SlowQuery
{
    /**
     * 说明:
     *
     * @param $request
     * @param Closure $next
     * @return array|mixed
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author 刘坤涛
     */
    public function handle($request, Closure $next)
    {


        //接口响应的时间
        $t1 = microtime(true);
        $response =  $next($request);
        //计算接口响应时间
        $time = (microtime(true) - $t1) * 1000;
        $time= 900;
        //如果时间大于1s,请求query接口,将该接口插入数据表中
        if ($time >= 1000) {
            $data = [
                'app_name' => env('APP_NAME'),
                'url' => $request->getRequestUri(),
                'time' => $time
            ];
            $http = new Client();
            try {
//                dd($data, url('api/admin/query'));
                $res= $http->request('POST', url('api/admin/query'), [
                    'form_params' => $data
                ]);
//                $res= $http->post(url('api/admin/query'), [
//                    'form_params' => $data
//                ]);
            } catch (\Exception $e) {
                \Log::info('记录失败'.$e->getMessage());
            }
            return ['success' => true, 'message' => json_decode($res->getBody())];
        }

        return $response;
    }
}
