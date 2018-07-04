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
        return '跳转首页';
    }






}
