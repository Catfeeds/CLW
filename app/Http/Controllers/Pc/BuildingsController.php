<?php

namespace App\Http\Controllers\Pc;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Block;
use App\Models\Building;
use App\Repositories\BuildingsRepository;
use App\Services\BuildingsService;
use Illuminate\Http\Request;

class BuildingsController extends Controller
{
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

        // 房源数量
        $building->house_count = $houses->count();

        // 获取楼盘下房源均价(楼盘下房源总价格/楼盘下房源总面积)
        $building->buildingAverage = round($houses->sum('total_price') / $houses->sum('constru_acreage'),2).'元/㎡.月';

        // 获取商圈下房源均价
        $blockId = $building->block->id;    // 商圈id
        $block = Block::where('id', $blockId)->with('building.buildingBlock.house')->first();
        $blockAllHouse = $this->getAllHouse($block);
        $building->blockAverage = round(collect($blockAllHouse)->collapse()->sum('total_price') / collect($blockAllHouse)->collapse()->sum('constru_acreage'),2).'元/㎡.月';

        // 获取区域下房源均价
        $areaId = $building->block->area->id;
        $area = Area::where('id', $areaId)->with('building.buildingBlock.house')->first();
        $areaAllHouse = $this->getAllHouse($area);
        $building->areaAverage = round(collect($areaAllHouse)->collapse()->sum('total_price') / collect($areaAllHouse)->collapse()->sum('constru_acreage'),2).'元/㎡.月';

        // 猜你喜欢
        $request->area_id = $areaId;
        $likeBuilding = array_slice($repository->buildingList($request, $service, null, true),0,4);


        // $likeBuilding 猜你喜欢
        // $building 楼盘基本数据
        // $houses 楼盘下房源数据
        // dd(['building' => $building->toArray(), 'likeBuilding' => $likeBuilding, 'houses' => $houses->toArray()]);
        return view('home.building_detail', ['building' => $building, 'likeBuilding' => $likeBuilding, 'houses' => $houses]);
        // return $building;
    }

    public function getAllHouse($res)
    {
        $datas = array();
        foreach ($res->building as $v) {
            foreach ($v->buildingBlock as $val) {
                $datas[] = $val->house->toArray();
            }
        }
        return $datas;
    }
}
