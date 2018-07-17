<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\HousesRequest;
use App\Models\HouseLabel;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\OfficeBuildingHousesService;
use App\Handler\Common;

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
    public function index(OfficeBuildingHousesService $service)
    {
        if (empty(Common::user()->can('House_list'))) {
            return $this->sendError('无House_list权限','403');
        }
        $res = $this->repo->HouseList($this->req->per_page??null, json_decode($this->req->condition), $service);
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
        if (empty(Common::user()->can('add_house_label'))) {
            return $this->sendError('无add_house_label权限','403');
        }
        $res = $this->repo->addHouseLabel($this->req);
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
        if (empty(Common::user()->can('show_house'))) {
            return $this->sendError('无show_house权限','403');
        }
        $res = $this->repo->showHouse($this->req);
        return $this->sendResponse($res, '房源上架成功');
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
        if (empty(Common::user()->can('del_house_label'))) {
            return $this->sendError('无del_house_label权限','403');
        }
        $res = HouseLabel::where('house_id', $id)->delete();
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
        if (empty(Common::user()->can('del_show_house'))) {
            return $this->sendError('无del_show_house权限','403');
        }
        $res = $this->repo->delShowHouse($id);
        return $this->sendResponse($res, '房源下架成功');
    }

}
