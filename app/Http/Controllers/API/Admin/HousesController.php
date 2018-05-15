<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\HousesRequest;
use App\Models\HouseLabel;
use App\Repositories\OfficeBuildingHousesRepository;

class HousesController extends APIBaseController
{
    protected $repo;
    protected $req;

    public function __construct
    (
        OfficeBuildingHousesRepository $repository,
        HousesRequest $request
    )
    {
        $this->repo = $repository;
        $this->req = $request;
    }

    /**
     * 说明: 获取房源列表
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function index()
    {
        $res = $this->repo->HouseList();
        return $this->sendResponse($res, '房源列表获取成功');
    }

    /**
     * 说明: 添加房源标签
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function store()
    {
        $res = $this->repo->addHouseLabel($this->req);
        return $this->sendResponse($res, '房源标签添加成功');
    }
    
    /**
     * 说明: 删除房源标签
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function destroy($id)
    {
        $res = HouseLabel::find($id)->delete();
        return $this->sendResponse($res, '房源标签删除成功');
    }
}
