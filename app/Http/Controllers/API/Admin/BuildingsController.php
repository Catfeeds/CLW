<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingsRequest;
use App\Models\Building;
use App\Models\BuildingLabel;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Handler\Common;

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

    // 获取楼盘列表
    public function index(
        BuildingsService $service
    )
    {
        if (empty(Common::user()->can('building_lists'))) {
            return $this->sendError('无楼盘列表权限','403');
        }
        $res = $this->repo->buildingLists($this->req, json_decode($this->req->condition), $service);
        return $this->sendResponse($res, '楼盘列表获取成功');
    }

    // 修改楼盘和楼盘特色
    public function update(Building $building)
    {
        if (empty(Common::user()->can('update_building'))) {
            return $this->sendError('无楼盘修改权限','403');
        }
        // 修改楼盘名称时判断是否重复
        if (!empty($this->req->name) && $this->req->name != $building->name && in_array($this->req->name,Building::where('area_guid', $this->req->area_guid)->pluck('name')->toArray())) return $this->sendError('该区域下已有此楼盘,请勿重复设置');

        $res = $this->repo->updateBuilding($this->req, $building);
        if (!$res) return $this->sendError('楼盘修改失败');
        return $this->sendResponse($res, '楼盘修改成功');
    }

    /**
     * 说明: 添加楼盘标签
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function addBuildingLabel()
    {
        if (empty(Common::user()->can('add_building_label'))) {
            return $this->sendError('无楼盘标签添加权限','403');
        }
        $res = $this->repo->addBuildingLabel($this->req);
        return $this->sendResponse($res, '楼盘标签添加成功');
    }

    // 删除楼盘标签
    public function destroy($guid)
    {
        if (empty(Common::user()->can('del_building_label'))) return $this->sendError('无楼盘标签删除权限','403');

        $res = BuildingLabel::where('building_guid', $guid)->first()->delete();
        return $this->sendResponse($res, '楼盘标签删除成功');
    }

    /**
     * 说明: 获取楼盘特色下拉数据
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function buildingFeatureList()
    {
        $res = $this->repo->getBuildingFeatureList()->pluck('name', 'id')->toArray();
        return $this->sendResponse($res, '获取楼盘特色下拉数据成功');

    }
}
