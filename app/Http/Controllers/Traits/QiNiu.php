<?php

namespace App\Http\Controllers\Traits;
use App\Handler\Common;

trait QiNiu
{
    /**
     * 说明: 获取七牛token
     *
     * @return string
     * @author 罗振
     */
    public function token()
    {
        if (empty($token = Common::getToken())) {
            return $this->sendError('获取失败');
        } else {
            return $this->sendResponse($token, '获取token成功!');
        }
    }
}