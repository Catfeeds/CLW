<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\BespeaksRequest;
use App\Services\BespeaksService;

class BespeaksController extends Controller
{
    /**
     * 说明: 委托找房视图
     *
     * @author 刘坤涛
     */
    public function index()
    {
        return view('home.bespeaks_house');
    }
    /**
     * 说明: 预约
     *
     * @param BespeaksRequest $request
     * @param BespeaksService $bespeaksService
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        BespeaksRequest $request,
        BespeaksService $bespeaksService
    )
    {
        if (empty($result = $bespeaksService->addBespeaks($request, 'PC'))) {
            return $this->sendError('预约失败');
        }
        return $this->sendResponse($result, '预约成功');
    }

    // 获取登录用户预约消息成功
    public function getUserBespeaks(
        BespeaksService $bespeaksService
    )
    {
        $res = $bespeaksService->getUserBespeaks();
        return $this->sendResponse($res,'获取登录用户预约消息成功');

    }

}
