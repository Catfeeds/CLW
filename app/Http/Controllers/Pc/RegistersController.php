<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChat\RegistersRequest;
use App\Services\RegistersService;


class RegistersController extends Controller
{
    //注册页面
    public function index()
    {
        return view('test');
        return '注册页面';
    }

    //注册
    public function store
    (
        RegistersRequest $request,
        RegistersService $service
    )
    {
        $res = $service->weAddUser($request);
        if (empty($res['status'])) return $this->sendError($res['message']);
        return $this->sendResponse($res,'注册成功');
    }






}
