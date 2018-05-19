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
        $res = $this->repo->HouseList($this->req->per_page??null, json_decode($this->req->condition));
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
        //判断当前房源是否存在
        $house = HouseLabel::where('house_id', $this->req->house_id)->first();
        //如果有数据,则更新数据,否则添加
        if ($house) {
            $res = $this->repo->updateHouseLabel($this->req);
        } else {
            $res = $this->repo->addHouseLabel($this->req);
        }
        return $this->sendResponse($res, '房源标签添加成功');
    }

    /**
     * 说明: 房源上架
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function showHouse()
    {
        //判断当前房源是否存在
        $house = HouseLabel::where('house_id', $this->req->house_id)->first();
        //如果有数据,则更新数据,否则添加
        if ($house) {
            $res = $this->repo->updateShowHouse($this->req);
        } else {
            $res = $this->repo->showHouse($this->req);
        }
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
        $res = HouseLabel::where('house_id', $id)->update(['label' => 2]);
        return $this->sendResponse($res, '房源标签删除成功');
    }

    /**
     * 说明: 房源下架
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function del($id)
    {
        $res = HouseLabel::where('house_id', $id)->update(['status' => 1]);
        return $this->sendResponse($res, '房源下架成功');
    }

}
