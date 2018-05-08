<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingsRequest;
use App\Models\BuildingLabel;
use App\Repositories\BuildingsRepository;

class BuildingsController extends APIBaseController
{
    protected $repo;
    protected $req;

    public function __construct
    (
        BuildingsRepository $repository,
        BuildingsRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    /**
     * 说明: 获取楼盘列表
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index()
    {
        $res = $this->repo->buildingLists();
        return $this->sendResponse($res, '楼盘列表获取成功');
    }

    /**
     * 说明: 添加楼盘标签
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        $res = $this->repo->addBuildingLabel($this->req);
        return $this->sendResponse($res, '楼盘标签添加成功');
    }



}
