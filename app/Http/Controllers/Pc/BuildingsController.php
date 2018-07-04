<?php

namespace App\Http\Controllers\Pc;

use App\Handler\Common;
use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingFeature;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use App\Services\CustomPage;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
    // 楼盘详情
    public function show(
        Request $request,
        Building $building,
        BuildingsRepository $repository,
        BuildingsService $service
    )
    {
        // 楼盘下房源基本详情
        $building = $repository->getShow($building, $service);
        // 楼盘下所有房源
        $houses = $building->house;
        // 楼盘所属商圈
        $block = $building->block;
        // 房源数量
        $building->house_count = $houses->count();
        // 获取楼盘下房源均价(楼盘下房源总价格/楼盘下房源总面积)
        $building->buildingAverage = $service->getBuildingAveragePrice($houses);
        // 商圈下房源均价
        $building->blockAverage = $service->getBlockAveragePrice($block->id);
        // 楼盘所属区域
        $areaId = $block->area->id;
        // 区域下房源均价
        $building->areaAverage = $service->getAreaAveragePrice($areaId);
        // 猜你喜欢
        $request->area_id = $areaId;   // 区域id
        $likeBuilding = array_slice($repository->buildingList($request, $service, null, true),0,4);
        // return $building;
        return view('home.building_detail', ['building' => $building, 'likeBuilding' => $likeBuilding, 'houses' => $houses, 'block' => $block]);
    }

    // 楼盘列表
    public function buildingList(
        Request $request,
        BuildingsRepository $buildingsRepository,
        BuildingsService $service
    )
    {
        // 获取区域
        $allAreas = Area::all();
        $areas = $allAreas->map(function($v) {
            return [
                'id' => $v->id,
                'name' => $v->name,
            ];
        });

        // 获取区域
        $blocks = array();
        if (!empty($request->area_id)) {
            $blocks = Block::where('area_id', $request->area_id)->pluck('name','id')->toArray();
        }

        // 获取特色
        $buildingFeatures = BuildingFeature::pluck('name','id')->toArray();

        // 前段返回条件
        $data = $request->all();

        if (!empty($request->keyword)) {
            $string = "'". $request['keyword'] . "'";

            $res = \DB::select("select building_id from media.building_keywords where MATCH(keywords) AGAINST($string IN BOOLEAN MODE)");

            // 获取所有楼盘id
            $buildingIds = array_column(Common::objectToArray($res), 'building_id');

            $res = $buildingsRepository->buildingList($request, $service, $buildingIds,true,true);
        } else {
            // 处理价格,面积,特色
            if (!empty($request->acreage)) $request->offsetSet('acreage', explode('-',$request->acreage));
            if (!empty($request->unit_price)) $request->offsetSet('unit_price', explode('-',$request->unit_price));

            if (!empty($request->features) && strlen($request->features) > 1) $request->offsetSet('unit_price', explode('-',$request->features));

            // 楼盘列表数据
            $res = $buildingsRepository->buildingList($request, $service, null,true,true);
        }
        return view('home.house_list', [
            'house_count' => $res['house_count'],
            'areas' => $areas,
            'blocks' => $blocks,
            'buildingFeatures' => $buildingFeatures,
            'Results'=>$res['data'],
            'page' => $res['page'],
            'request' => $data,
            'count' => $res['house_count']
        ]);
    }

    // 通过城市,区域,商圈,楼盘,楼盘地址搜索
    public function buildingSearch(
        Request $request
    )
    {
        $string = "'". $request->search . "'";

        $res = \DB::select("select building_id from media.building_keywords where MATCH(keywords) AGAINST($string IN BOOLEAN MODE)");

        // 获取所有楼盘id
        $buildingIds = array_column(Common::objectToArray($res), 'building_id');

        $res = Building::whereIn('id', $buildingIds)->paginate(10);

        return $this->sendResponse($res,'获取搜索楼盘成功');
    }

}
