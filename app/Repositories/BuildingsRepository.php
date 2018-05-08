<?php
namespace App\Repositories;

use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\OfficeBuildingHouse;
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
        // 根据条件获取楼盘数据
        // 楼盘必须字段处理
        $buildings = Building::paginate(20);
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
                if ($house['rent_price_unit'] == 2) {
                    $number++;
                    $price += $house->rent_price;
                }
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

    public function buildingList($request)
    {
        $buildigns = Building::make();
        // 如果有商圈id 查商圈
        if (!empty($request->block_id)) {
            $buildings = $buildigns->where('block_id', $request->block_id)->get();
        } elseif(!empty($request->area_id)) {
            $blocks = Block::where('area_id', $request->area_id)->pluck('id')->toarray();
            $buildings = $buildigns->whereIn('block_id', $blocks)->get();
        } else {
            $buildings = $buildigns->get();
        }

        $buildingBlocks = BuildingBlock::whereIn('building_id', $buildings)->pluck('id')->toarray();

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
        // 特色
        $houses = $houses->pluck('id')->toArray();
        dd($houses);
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




}