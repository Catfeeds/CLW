<?php

namespace App\Http\Controllers\PC;

use App\Handler\Common;
use App\Http\Controllers\Controller;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Services\MapsService;
use Illuminate\Http\Request;

class MapsController extends Controller
{
    // 根据当前gps指定距离获取周边楼盘
    public function getPeripheryBuildings(
        Request $request,
        MapsService $mapsService,
        BuildingsRepository $repository,
        BuildingsService $buildingsService
    )
    {
        if (!empty($request->keyword)) {
            $string = "'". $request['keyword'] . "'";
            $res = \DB::select("select building_id from media.building_keywords where MATCH(keywords) AGAINST($string IN BOOLEAN MODE)");
            // 获取所有楼盘id
            $buildingIds = array_column(Common::objectToArray($res), 'building_id');
            $res = $repository->buildingList($request, $buildingsService, $buildingIds,true);
        } elseif (!empty($request->distance) && !empty($request->gps)) {
            $res = $mapsService->getPeripheryBuildings($request);
        } else {
            // 处理单价,总价,面积
            if (!empty($request->acreage)) $request->offsetSet('acreage', explode('-',$request->acreage));
            if (!empty($request->unit_price)) $request->offsetSet('unit_price', explode('-',$request->unit_price));
            if (!empty($request->total_price)) $request->offsetSet('total_price', explode('-',$request->total_price));

            // 楼盘列表数据
            $res = $repository->buildingList($request, $buildingsService,null,true);

            if (empty($request->area_id) && empty($request->block_id)) {
                // 通过楼盘获取商圈
                $areaLocations = $mapsService->getBuildingArea($res);

            }

        }

        return $this->sendResponse($res,'地图找楼获取成功');
    }

    // 获取区域地理位置信息
    public function getAreaLocationsList(
        MapsService $mapsService
    )
    {
        $res = $mapsService->getAreaLocationsList();
        return $this->sendResponse($res,'获取区域地理位置信息成功');
    }

    // 获取商圈地理位置信息
    public function getBlockLocationsList(
        MapsService $mapsService
    )
    {
        $res = $mapsService->getBlockLocationsList();
        return $this->sendResponse($res,'获取商圈地理位置信息成功');
    }
    
}
