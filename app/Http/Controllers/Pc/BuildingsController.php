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
        // 楼盘所属区域
        $areaId = $block->area->id;
        // 区域id
        $request->area_id = $areaId;

        //区域商圈名称对应id
        $data[0]['id'] = $areaId;
        $data[0]['name'] = $block->area->name;
        $data[1]['id'] = $block->id;
        $data[1]['name'] = $block->name;
        $data[2]['id'] = $building->id;
        $data[2]['name'] = $building->name;

        return view('home.building_detail', [
            'building' => $building,
            'houses' => $houses,
            'block' => $block,
            'data' => $data
        ]);
    }

    // 楼盘详情市场行情
    public function marketPrice(
        $buildingId,
        BuildingsService $service
    )
    {
        $res = $service->marketPrice($buildingId);
        return $this->sendResponse($res,'楼盘详情市场行情获取成功');
    }

    // 楼盘详情猜你喜欢
    public function likeBuilding(
        BuildingsRepository $repository,
        BuildingsService $service,
        Request $request
    )
    {
        $likeBuilding = array_slice($repository->buildingList($request, $service, null, true),0,4);

        return $this->sendResponse($likeBuilding,'楼盘详情猜你喜欢数据获取成功');
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

        // 分页跟随条件
        $request->offsetSet('data', $data);

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
            if (!empty($request->features) && strlen($request->features) > 1) $request->offsetSet('features', explode('-',$request->features));

            // 楼盘列表数据
            $res = $buildingsRepository->buildingList($request, $service, null,true,true);
        }

        // 相关推荐
        if (empty($res['data']->count())) {
            $recommend = $buildingsRepository->buildingList(collect(),$service,null,true,null,null);
            $recommends = collect($recommend)->take(10);
        }

        return view('home.house_list', [
            'house_count' => $res['house_count'],
            'areas' => $areas,
            'blocks' => $blocks,
            'buildingFeatures' => $buildingFeatures,
            'Results'=>$res['data'],
            'page' => $res['page'],
            'request' => $data,
            'count' => $res['house_count'],
            'recommend' => $recommends??collect()
        ]);
    }
}
