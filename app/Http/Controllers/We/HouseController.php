<?php

namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Models\BrowseRecord;
use App\Models\Houses;
use App\Models\OfficeBuildingHouse;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\HousesService;
use App\Services\OfficeBuildingHousesService;
use Illuminate\Support\Facades\Session;

class HouseController extends APIBaseController
{
    // 房源详情
    public function show
    (
        $id,
        HousesService $service
    )
    {
        $officeBuildingHouse = Houses::findOrFail($id);
        // 浏览记录
        if (!empty(Session::get('user'))) BrowseRecord::create([
            'user_id' => Session::get('user')->id,
            'house_id' => $officeBuildingHouse->id
        ]);
        // 房源数据
        $service->labelShow($officeBuildingHouse);
        $house = $service->getShow($officeBuildingHouse);
        // 相关房源
        return view('we.house_detail')->with(['house' => $house]);
    }

    // 房源详情相关房源
    public function showOffice
    (
        $id,
        OfficeBuildingHousesRepository $buildingHousesRepository,
        HousesService $service
    )
    {
        $res = $buildingHousesRepository->getShowOffice($service, $id);
        if (!$res) return $this->sendError('该房源下无相关房源');
        return $this->sendResponse($res, '房源列表获取成功');
    }


    // 找房列表区域搜索条件
    public function blockCondition(
        HousesService $service
    )
    {
        if (empty($res = $service->blockCondition())) return $this->sendError('找房列表区域搜索条件获取失败');
        return $this->sendResponse($res,'找房列表区域搜索条件获取成功');
    }

    // 找房列表其他搜索条件
    public function otherCondition(
        HousesService $service
    )
    {
        if (empty($res = $service->otherCondition())) return $this->sendError('找房列表其他搜索条件获取失败');
        return $this->sendResponse($res,'找房列表其他搜索条件获取成功');
    }
}
