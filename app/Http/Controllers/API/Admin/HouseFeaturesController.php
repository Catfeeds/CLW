<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\HouseFeaturesRequest;
use App\Models\HouseFeature;
use App\Repositories\HouseFeaturesRepository;

class HouseFeaturesController extends APIBaseController
{
    protected $repo;
    protected $req;

    public function __construct
    (
         HouseFeaturesRepository $repository,
         HouseFeaturesRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    /**
     * 说明: 获取房源特色列表
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index()
    {
        $res = $this->repo->houseFeatureList();
        return $this->sendResponse($res, '房源特色列表获取成功');
    }

    /**
     * 说明: 添加房源特色
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        $res = $this->repo->addHouseFeature($this->req);
        return $this->sendResponse($res, '房源特色标签添加成功');
    }


    public function edit(HouseFeature $houseFeature)
    {
        return $this->sendResponse($houseFeature, '房源特色修改之前原始数据');
    }

    /**
     * 说明: 修改房源特色
     *
     * @param HouseFeature $houseFeature
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function update(HouseFeature $houseFeature)
    {
        if (!empty($this->req->name) && $this->req->name != $houseFeature->name && in_array($this->req->name, HouseFeature::pluck('name')->toArray())) return $this->sendError('房源特色重复');

        $res = $this->repo->updateHouseFeature($this->req, $houseFeature);
        if (!$res) return $this->sendError('房源特色修改失败');
        return $this->sendResponse($res, '房源特色修改成功');
    }

    /**
     * 说明: 删除楼盘特色
     *
     * @param HouseFeature $houseFeature
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     * @author 刘坤涛
     */
    public function destroy(HouseFeature $houseFeature)
    {
        $res = $houseFeature->delete();
        return $this->sendResponse($res, '房源特色删除成功');
    }
}
