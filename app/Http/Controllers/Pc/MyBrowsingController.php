<?php

namespace App\Http\Controllers\Pc;

use App\Repositories\BuildingsRepository;
use App\Repositories\OfficeBuildingHousesRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MyBrowsingController extends Controller
{
    //楼盘浏览列表
    public function ropertyBrowsingList
    (
        Request $request,
        BuildingsRepository $repository,
        BuildingsService $service
    )
    {
        $res = $repository->buildingRecordList($request);
        $data = [];
        foreach ($res as $k=>$v) {
            $data[$k]['id'] = $v->id;
            $data[$k]['img'] = empty($v->album)?config('setting.building_default_img'):config('setting.qiniu_url') .$v->album[0];
            $data[$k]['name'] = $v->name;
            $data[$k]['rent'] = $service->getBuildingAveragePrice($v->house);
            $data[$k]['address'] = $v->area->name . '-' . $v->block->name;
            $data[$k]['acreage'] = intval($v->house->min('constru_acreage')) . ' - ' . intval($v->house->max('constru_acreage')). '㎡';
        }
        return $this->sendResponse($data,'获取成功');
    }

    // 房源浏览列表
    public function listingList
    (
        Request $request,
        OfficeBuildingHousesRepository $repository
    )
    {
        $res = $repository->officeBuildingHousesRecordList($request);
        $data = [];
        foreach ($res as $k=>$v) {
            $data[$k]['id'] = $v->id;
            $data[$k]['img'] = empty($v->indoor_img)?config('setting.pc_building_house_default_img') :config('setting.qiniu_url') .$v->indoor_img[0];
            $data[$k]['name'] = $v->title;
            $data[$k]['rent'] = $v->unit_price . '元/㎡.月';
            $data[$k]['acreage'] = $v->constru_acreage. '㎡';
            $data[$k]['address'] = $v->buildingBlock->building->block->area->name . '-' .$v->buildingBlock->building->block->name;
        }
        return $this->sendResponse($data,'获取成功');
    }
}
