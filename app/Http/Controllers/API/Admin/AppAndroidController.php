<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AppAndroidRequest;
use App\Repositories\AppAndroidRepository;

class AppAndroidController extends APIBaseController
{
    // app,android版本列表
    public function index(
        AppAndroidRepository $repository
    )
    {
        $res = $repository->appAndroidList();
        return $this->sendResponse($res, '获取App,Android版本列表成功');
    }

    // app,android版本添加
    public function store(
        AppAndroidRequest $request,
        AppAndroidRepository $repository
    )
    {
        $res = $repository->addAppAndroid($request);
        if ($res['status'] == false) return $this->sendError($res['message']);
        return $this->sendResponse($res, $res['message']);
    }


}
