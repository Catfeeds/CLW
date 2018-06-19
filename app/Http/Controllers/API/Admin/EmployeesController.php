<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\EmployeesRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class EmployeesController extends APIBaseController
{
    //生成带参数二维码
    public function store(EmployeesRequest $request)
    {
        dd(123);
        $url = config('setting.wechat_url') . '/oauth_wechat?redirectUrl=getTelWeChat?param=name='
            . $request->name . ';tel='
            . $request->tel . ';email='
            . $request->email;
       $res =  QrCode::size(300)->generate($url);
       return $res;
    }
}
