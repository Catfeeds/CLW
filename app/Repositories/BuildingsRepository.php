<?php
namespace App\Repositories;

use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingFeature;
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
     * 说明: 添加楼盘信息和楼盘特色
     *
     * @param $request
     * @return bool
     * @author 刘坤涛
     */
    public function addBuilding($request)
    {
        \DB::beginTransaction();
        try {
           // 添加楼盘信息
            $building = Building::create([
                'name' => $request->name,
                'gps' => $request->gps,

                'type' => $request->type,
                'area_id' => $request->area_id,
                'block_id' => $request->block_id,
                'address' => $request->address,

                'developer' => $request->developer,
                'years' => $request->years,
                'acreage' => $request->acreage,
                'building_block_num' => $request->building_block_num,
                'parking_num' => $request->parking_num,
                'parking_fee' => $request->parking_fee,
                'greening_rate' => $request->greening_rate,

                'company' => $request->company,
                'album' => $request->album
            ]);
            if (empty($building)) {
                throw new \Exception('楼盘信息添加失败');
            }
            //添加楼座信息
            $buildingBlocks = $request->building_block;
            foreach ($buildingBlocks as $buildingBlock) {
                if (!empty($buildingBlock->name)) {
                    BuildingBlock::create([
                        'building_id' => $building->id,
                        'name' => $buildingBlock['name'],
                        'name_unit' => $buildingBlock['name_unit'],
                        'unit' => $buildingBlock['unit'],
                        'unit_unit' => $buildingBlock['unit_unit'],
                    ]);
                }

            }

            //添加楼盘特色
            $buildingFeatures = $request->building_feature;
            $res = BuildingHasFeature::where('building_id', $building->id)->whereIn('building_feature_id', $buildingFeatures)->get();
            if ($res) throw new \Exception('楼盘特色不能重复添加');

            foreach($buildingFeatures as $buildingFeature) {
                BuildingHasFeature::create([
                    'building_id' => $building->id,
                    'building_feature_id' => $buildingFeature
                ]);
            }
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('楼盘信息添加失败'. $e->getMessage());
            return false;
        }
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

    /**
     * 说明: 修改楼盘信息
     *
     * @param $request
     * @param $building
     * @return bool
     * @author 刘坤涛
     */
    public function updateBuilding($request, $building)
    {
        \DB::beginTransaction();
        try {
             $building->name = $request->name;
             $building->gps = $request->gps;
             $building->type = $request->type;
             $building->area_id = $request->area_id;
             $building->block_id = $request->block_id;
             $building->address = $request->address;
             $building->developer = $request->developer;
             $building->years = $request->years;
             $building->acreage = $request->acreage;
             $building->building_block_num = $request->building_block_num;
             $building->parking_num = $request->parking_num;
             $building->parking_fee = $request->parking_fee;
             $building->greening_rate = $request->greening_rate;
             $building->company = $request->company;
             $building->album = $request->album;
             if ($building->save()) throw new \Exception('楼盘修改失败');
             // 获取要修改的特色
            $buildingFeatures = $request->building_feature;
            // 查询查该楼盘已经有的特色
            $features = BuildingHasFeature::where('building_id', $building->id)->pluck('building_feature_id')->toArray();

            //修改特色-已有特色,得到要添加的特色
            $addFeature = array_diff($buildingFeatures, $features);
            if (!empty($addFeature)) {
                $res = BuildingHasFeature::where('building_id', $building->id)->whereIn('building_feature_id', $addFeature)->get();
                if ($res) throw new \Exception('楼盘特色不能重复添加');
                foreach($addFeature as $v) {
                    BuildingHasFeature::create([
                        'building_id' => $building->id,
                        'building_feature_id' => $v
                    ]);
                }
            }
            //已有特色-修改特色,得到要删除的特色
            $delFeature = array_diff($features, $buildingFeatures);
            if (!empty($delFeature)) {
                foreach($delFeature as $v) {
                    BuildingHasFeature::where([
                        'building_id' => $building->id,
                        'building_feature_id' => $v
                    ])->delete();
                }
            }
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('楼盘信息修改失败'. $e->getMessage());
            return false;
        }
    }

    /**
     * 说明: 获取楼盘特色下拉数据
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function getBuildingFeatureList()
    {
        return BuildingFeature::all();
    }

}