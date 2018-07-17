<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\AppAndroidRequest;
use App\Repositories\AppAndroidRepository;
use App\Handler\Common;

class AppAndroidController extends APIBaseController
{
    // app,android版本列表
    public function index(
        AppAndroidRepository $repository
    )
    {
        if (empty(Common::user()->can('app_android_list'))) {
            return $this->sendError('无app_android_list权限','403');
        }
        $res = $repository->appAndroidList();
        return $this->sendResponse($res, '获取App,Android版本列表成功');
    }

    // app,android版本添加
    public function store(
        AppAndroidRequest $request,
        AppAndroidRepository $repository
    )
    {
        if (empty(Common::user()->can('add_app_android'))) {
            return $this->sendError('无add_app_android权限','403');
        }
        $res = $repository->addAppAndroid($request);
        if ($res['status'] == false) return $this->sendError($res['message']);
        return $this->sendResponse($res, $res['message']);
    }


}
