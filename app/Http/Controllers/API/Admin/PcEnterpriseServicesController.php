<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\PcEnterpriseServicesRequest;
use App\Models\PcEnterpriseService;
use App\Repositories\PcEnterpriseServicesRepository;

class PcEnterpriseServicesController extends APIBaseController
{

    private $req;
    private $repo;

    public function __construct
    (
        PcEnterpriseServicesRepository $repository,
        PcEnterpriseServicesRequest $request
    )
    {
        $this->req = $request;
        $this->repo = $repository;
    }

    public function index()
    {
        $res = $this->repo->getList();
        return $this->sendResponse($res, '服务列表获取成功');
    }

    public function store()
    {
        $res = $this->repo->addService($this->req);
        return $this->sendResponse($res, '服务添加成功');
    }

    public function edit(PcEnterpriseService $pcEnterpriseService)
    {
        return $this->sendResponse($pcEnterpriseService, '修改之前原始数据');
    }

    public function update(PcEnterpriseService $pcEnterpriseService)
    {
        $res = $this->repo->updateService($pcEnterpriseService, $this->req);
        if (!$res) return $this->sendError('修改失败');
        return $this->sendResponse($res, '修改成功');
    }

    public function destroy(PcEnterpriseService $pcEnterpriseService)
    {
        $res = $pcEnterpriseService->delete();
        return $this->sendResponse($res,'删除成功');
    }
}
