<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\ServicesRequest;
use App\Models\Service;
use App\Repositories\ServicesRepository;

class ServicesController extends APIBaseController
{
    /**
     * 说明:服务列表
     *
     * @param ServicesRepository $servicesRepositories
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index
    (
        ServicesRepository $servicesRepositories
    )
    {
        $res = $servicesRepositories->serviceList();
        return $this->sendResponse($res,'服务列表获取成功');
    }

    /**
     * 说明:添加服务
     *
     * @param ServicesRepository $servicesRepository
     * @param ServicesRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store
    (
        ServicesRepository $servicesRepository,
        ServicesRequest $request
    )
    {
        $res = $servicesRepository->addService($request);
        return $this->sendResponse($res,'服务添加成功');
    }

    /**
     * 说明:服务修改之前原始数据
     *
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function edit(
        Service $service
    )
    {
        return $this->sendResponse($service,'服务修改之前原始数据');
    }


    /**
     * 说明:更新服务
     *
     * @param ServicesRepository $servicesRepositories
     * @param ServicesRequest $request
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update
    (
        ServicesRepository $servicesRepositories,
        ServicesRequest $request,
        Service $service
    )
    {
        $res = $servicesRepositories->updateService($request, $service);
        return $this->sendResponse($res, '服务更新成功');
    }

    /**
     * 说明:删除服务
     *
     * @param Service $service
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(Service $service)
    {
        $res = $service->delete();
        return $this->sendResponse($res,'服务删除成功');
    }
}
