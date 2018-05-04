<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServicesRequest;
use App\Repositories\ServicesRepositories;

class ServicesController extends APIBaseController
{

    public function index()
    {
        //
    }

    /**
     * 说明:添加服务
     *
     * @param ServicesRepositories $servicesRepositories
     * @param ServicesRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        ServicesRepositories $servicesRepositories,
        ServicesRequest $request
    )
    {
        $res = $servicesRepositories->addService($request);
        return $this->sendResponse($res,'服务添加成功');
    }





    public function edit()
    {
        //
    }


    public function update()
    {
        //
    }


    public function destroy()
    {
        //
    }
}
