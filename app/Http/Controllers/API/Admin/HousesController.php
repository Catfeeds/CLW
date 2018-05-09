<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\HousesRequest;
use App\Models\HouseLabel;
use App\Repositories\HousesRepository;

class HousesController extends APIBaseController
{
    protected $repo;
    protected $req;

    public function __construct
    (
        HousesRepository $repository,
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

    public function store()
    {
        $res = $this->repo->addHouse($this->req);
        return $this->sendResponse($res, '房源添加成功');
    }
    

    /**
     * 说明: 添加房源标签
     *
     * @return \Illuminate\Http\JsonResponse
     * @author 刘坤涛
     */
    public function addHouseLabel()
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

    /**
     * 说明: 房源特色下拉数据
     *
     * @return \Illuminate\Support\Collection|static
     * @author 刘坤涛
     */
    public function houseFeatureList()
    {
        $res = $this->repo->getHouseFeatureList();
        return $res->map(function($v) {
            return [
                'label' => $v->name,
                'value' => $v->id
            ];
        });
    }
}
