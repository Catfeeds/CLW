<?php
namespace App\Repositories;

use App\Models\Block;
use App\Models\Building;
use App\Models\OfficeBuildingHouse;
use App\Models\BuildingLabel;
use App\Models\BuildingBlock;
use App\Models\BuildingHasFeature;
use Illuminate\Database\Eloquent\Model;

class BuildingsRepository extends  Model
{
    /**
     * 说明：分页列表数量
     *
     * @param $request
     * @return mixed
     * @author jacklin
     */
    public function buildingList($request)
    {
        // 取得符合条件的房子
        $houses = $this->houseList($request);

        // 根据楼盘分组
        $buildings = $this->groupByBuilding($houses);

        $buildingData = Building::whereIn('id', $buildings->keys())->with('block')->with('features')->paginate($request->per_page);

        return $this->buildingDataComplete($buildings, $buildingData);
    }

    /**
     * 说明：图片、楼盘名、优标签、商圈、单价、符合条件的房源数量、特色
     *
     * @param $buildings
     * @param $buildingData
     * @return mixed
     * @author jacklin
     */
    public function buildingDataComplete($buildings, $buildingData)
    {
        foreach ($buildingData as $index => $v) {
            // 房源数量
            $buildingData[$index]->house_count = $buildings[$v->id]->count();
            // 价格
            $buildingData[$index]->avg_price = $buildings[$v->id]->avg('unit_price');
            // 工位
            $buildingData[$index]->station_num = $this->buildingStationNum($buildings[$v->id]);
        }
        return $buildingData;
    }

    /**
     * 说明：楼盘下的工位数统计
     *
     * @param $houses
     * @return int|string
     * @author jacklin
     */
    public function buildingStationNum($houses)
    {
        foreach ($houses as $house) {
            if (empty($house->station_number)) continue;
            $station_number[] = trim(strstr($house->station_number, '-'),'-');
            $station_number[] = strstr($house->station_number, '-',true);
        }
        if (empty($station_number)) return '0';
        sort($station_number);
        if (empty($station_number[0])) $station_number[0] = 0;
        if (empty(end($station_number))) {
            $data['station_number'] = 0;
        } else {
            $data['station_number'] = $station_number[0] . '-' . end($station_number);
        }
        return $data['station_number'];
    }

    /**
     * 说明：根据条件 查询符合条件的房子 根据 楼盘分组
     *
     * @param $request
     * @return array
     * @author jacklin
     */
    public function houseList($request)
    {
        $buildings = Building::make();

        // 如果有商圈id 查商圈
        if (!empty($request->block_id)) {
            $buildings = $buildings->where('block_id', $request->block_id)->get();
        } elseif(!empty($request->area_id)) {
            $blocks = Block::where('area_id', $request->area_id)->pluck('id')->toArray();
            $buildings = $buildings->whereIn('block_id', $blocks)->get();
        }

        $buildings = $buildings->get()->pluck('id')->toArray();

        // 特色
        if (!empty($request->features)) {

            // 取出包含其中一个的数据
            $buildingHasFeatures = BuildingHasFeature::whereIn('building_feature_id', $request->features)
                ->get()->groupBy('building_id');

            // 筛选重复出现对应次数的数据
            $featureBuildings = $buildingHasFeatures->filter(function($v) use ($request){
                return $v->count() === count($request->features);
            })->flatten()->pluck('building_id')->unique()->toArray();

            $buildings = array_intersect($buildings, $featureBuildings);
        }
        // 筛选出符合条件的楼座
        $buildingBlocks = BuildingBlock::whereIn('building_id', $buildings)->pluck('id')->toArray();

        $houses = OfficeBuildingHouse::whereIn('building_block_id', $buildingBlocks);

        // 面积
        if (!empty($request->acreage)) $houses = $houses->whereIn('constru_acreage', $request->acreage);

        if (!empty($request->total_price)) {
            // 总价
            $houses = $houses->where('rent_price_unit', 1)->whereIn('rent_price', $request->total_price);
        } elseif (!empty($request->unit_price)) {
            // 单价
            $houses = $houses->where('rent_price_unit', 2)->whereIn('rent_price', $request->unit_price);
        }

        // 装修
        if (!empty($request->renovation)) $houses = $houses->where('renovation', $request->renovation);

        return $houses;
    }

    public function groupByBuilding($houses)
    {
        // 对楼座进行分组
        $buildingsBlocks = $houses->get()->groupBy('building_block_id');

        // 将房源根据
        foreach ($buildingsBlocks as $index => $buildingsBlock) {
            $buildingsBlock->buildingId = BuildingBlock::find($index)->building_id;
        }

        $buildings = $buildingsBlocks->groupBy('buildingId');

        // 将房源根据楼盘进行分组
        foreach ($buildings as $index => $building) {
            // 去除楼座那一层
            $buildings[$index] = $building->collapse();
        }
        return $buildings;
    }

    /**
     * 说明: 获取详情
     *
     * @param $building
     * @return mixed
     * @author 王成
     */
    public function getShow($building)
    {
        $constru_acreage=[];
        $price =[];
        $station_number = [];
        if(!empty($building->buildingBlock)) {
            foreach ($building->buildingBlock as $buildingBlock) {
                $OfficeBuildingHouse[] = $buildingBlock->OfficeBuildingHouse;
            }

            $houses = collect($OfficeBuildingHouse)->flatten()->toArray();

            foreach ($houses as $house) {
                $constru_acreage[] = (int)$house['constru_acreage'];

                if ($house['rent_price_unit'] == 2) {
                    $price[] = (int)$house['rent_price'];
                }

                if(!empty($house['station_number'])) {
                    $station_number[] = (int)$house['station_number'];
                }
            }

            sort($constru_acreage);
            if(!empty($price)){
                //价格区间
                sort($price);
                $building->price = reset($price) . '-' . end($price);
            }
            //工位数
            if(!empty($station_number)){
                sort($station_number);
                $building->station_number = reset($station_number) . '-' . end($station_number);
            }
            //建筑面积
            $building->constru_acreage = reset($constru_acreage) . '-' . end($constru_acreage);
        }

        return $building;
    }

    /**
     * 说明: 获取详情
     *
     * @param $id
     * @return mixed
     * @author 王成
     */
    public function getShowOffice($id)
    {
        $building = Building::find($id);
        $arrId = [];
        foreach($building->buildingBlock as $buildingBlock) {
           $OfficeBuildingHouse[] = $buildingBlock->OfficeBuildingHouse;
        }

        $houses = collect($OfficeBuildingHouse)->flatten()->toArray();

        foreach($houses as $getId)
        {
            $arrId[] = $getId['id'];
        }

        $res = OfficeBuildingHouse::whereIn('id', $arrId)->paginate(6);

        foreach ($res as $office)
        {
            if($office->rent_price_unit == 2 && !empty($office->constru_acreage) && !empty($office->rent_price))
            {
                // 总价
                $office->priceArr = $office->rent_price*$office->constru_acreage.'元/月';
                // 单价
                $office->unitPrice =$office->rent_price.'元/㎡.月';
            } elseif ($office->rent_price_unit == 1 && !empty($office->constru_acreage) && !empty($office->rent_price)) {
                // 总价
                $office->priceArr = $office->rent_price.'元/月';
                // 单价
                $office->unitPrice = $office->constru_acreage/$office->priceArr.'元/㎡.月';
            } else {
                $office->priceArr = 0;
                $office->unitPrice = 0;
            }
        }

        return $res;
    }

    /**
     * 说明: 获取楼盘列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function buildingLists()
    {
        return Building::all();
    }

    /**
     * 说明: 添加楼盘标签
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addBuildingLabel($request)
    {
        return BuildingLabel::create([
            'building_id' => $request->building_id
        ]);
    }

}