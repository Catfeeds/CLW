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
     * 说明: 首页楼盘列表
     *
     * @return mixed
     * @author 罗振
     */
    public function getList()
    {
        $buildings = Building::with('buildingBlock')->paginate(20);
        $data = array();
        foreach ($buildings as $building) {
            $buildingBlocks = $building->buildingBlock;
            $data['img'] = empty($building->album[0])?'':config('setting.qiniu_url').$building->album[0]; // 图片
            $data['name'] = $building->name;    // 名称
            $data['address'] = $building->address;  // 地址
            foreach ($buildingBlocks as $buildingBlock) {
                $officeBuildingHouses[] = $buildingBlock->OfficeBuildingHouse;
            }
            $houses = collect($officeBuildingHouses)->flatten()->toArray();
            $data['num'] = count($houses);   // 数量
            $price = 0;
            $number = 0;
            foreach ($houses as $house) {
                $station_number[] = trim(strstr($house['station_number'], '-'),'-');
                $station_number[] = strstr($house['station_number'], '-',true);
                if ($house['rent_price_unit'] == 2) {
                    $number++;
                    $price += $house->rent_price;
                }
            }
            sort($station_number);
            if (empty($station_number[0])) $station_number[0] = 0;
            if (empty(end($station_number))) {
                $data['station_number'] = 0;
            } else {
                $data['station_number'] = $station_number[0] . '-' . end($station_number);
            }
            if (!empty($price) && !empty($number)) {
                $data['price'] = $price / $number;

            } else {
                $data['price'] = 0;
            }

            $building->datas = $data;
        }

        return $buildings;
    }

    // 待完成 楼盘筛选数据
    public function buildingList($request)
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

        $buildingBlocks = BuildingBlock::whereIn('building_id', $buildings)->pluck('id')->toArray();

        // 面积
        $houses = OfficeBuildingHouse::whereIn('building_block_id', $buildingBlocks);

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