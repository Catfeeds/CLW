<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\BuildingsRequest;
use App\Models\Building;
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
     * 说明: 添加楼盘信息和楼盘特色
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        // 楼栋信息不能为空
        if (empty($this->req->building_block)) return $this->sendError('楼栋信息不能为空');

        // 楼盘名不允许重复
        $building = Building::where(['name' => $this->req->name, 'area_id' => $this->req->area_id])->first();
        if (!empty($building)) return $this->sendError('该区域下已有此楼盘，请勿重复添加');
        $res = $this->repo->addBuilding($this->req);
        if (!$res) return $this->sendError('楼盘添加失败');
        return $this->sendResponse($res, '楼盘添加成功');
    }

    /**
     * 说明: 修改楼盘之前原始数据
     *
     * @param Building $building
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function edit(Building $building)
    {
        return $this->sendResponse($building, '修改楼盘之前原始数据');
    }


    /**
     * 说明: 修改楼盘和楼盘特色
     *
     * @param Building $building
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update(Building $building)
    {
        // 修改楼盘名称时判断是否重复
        if (!empty($this->req->name) && $this->req->name != $building->name && in_array($this->req->name,Building::where('area_id', $this->req->area_id)->pluck('name')->toArray())) return $this->sendError('该区域下已有此楼盘,请勿重复设置');

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
        $res = $this->repo->addBuildingLabel($this->req);
        return $this->sendResponse($res, '楼盘标签添加成功');
    }

    /**
     * 说明: 删除楼盘标签
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function destroy($id)
    {
        $res = BuildingLabel::find($id)->delete();
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
        $res = $this->repo->getBuildingFeatureList();
        return $res->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id
            ];
        });
    }
}