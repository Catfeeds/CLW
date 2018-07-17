<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingFeaturesRequest;
use App\Models\BuildingFeature;
use App\Repositories\BuildingFeaturesRepository;
use App\Handler\Common;

class BuildingFeaturesController extends APIBaseController
{
    protected $repo;
    protected $req;

    
    public function __construct
    (
        BuildingFeaturesRepository $repository,
        BuildingFeaturesRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    /**
     * 说明: 获取楼盘特色列表
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index()
    {
        if (empty(Common::user()->can('building_feature_list'))) {
            return $this->sendError('无building_feature_list权限','403');
        }
        $res = $this->repo->buildingFeatureList();
        return $this->sendResponse($res, '楼盘特色列表获取成功');
    }

    /**
     * 说明: 添加楼盘特色
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        if (empty(Common::user()->can('add_building_feature'))) {
            return $this->sendError('无add_building_feature权限','403');
        }
        $res = $this->repo->addBuildingFeature($this->req);
        return $this->sendResponse($res, '楼盘特色添加成功');
    }


    public function edit(BuildingFeature $buildingFeature)
    {
        return $this->sendResponse($buildingFeature, '楼盘特色修改之前原始数据');
    }

    /**
     * 说明: 修改楼盘特色
     *
     * @param BuildingFeature $buildingFeature
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update(BuildingFeature $buildingFeature)
    {
        if (empty(Common::user()->can('update_building_feature'))) {
            return $this->sendError('无update_building_feature权限','403');
        }
        if (!empty($this->req->name) && $this->req->name != $buildingFeature->name && in_array($this->req->name, BuildingFeature::pluck('name')->toArray())) return $this->sendError('楼盘特色重复');

        $res = $this->repo->updateBuildingFeature($this->req, $buildingFeature);
        if (!$res) return $this->sendError('楼盘特色修改失败');
        return $this->sendResponse($res, '楼盘特色修改成功');
    }

    /**
     * 说明: 删除楼盘特色
     *
     * @param BuildingFeature $buildingFeature
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(BuildingFeature $buildingFeature)
    {
        if (empty(Common::user()->can('del_building_feature'))) {
            return $this->sendError('无del_building_feature权限','403');
        }
        $res = $buildingFeature->delete();
        return $this->sendResponse($res, '楼盘特色删除成功');
    }
}
