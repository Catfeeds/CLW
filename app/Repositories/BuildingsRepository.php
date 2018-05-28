<?php
namespace App\Repositories;

use App\Handler\Common;
use App\Models\Area;
use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\BuildingFeature;
use App\Models\BuildingHasFeature;
use App\Models\BuildingLabel;
use App\Models\OfficeBuildingHouse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BuildingsRepository extends  Model
{
    /**
     * 说明: 分页列表数量
     *
     * @param $request
     * @param $service
     * @param null $building_id
     * @param null $whetherPage
     * @return array
     * @author 罗振
     */
    public function buildingList(
        $request,
        $service,
        $building_id = null,
        $whetherPage = null
    )
    {
        // 取得符合条件房子
        $houses = $this->houseList($request, $building_id);

        // 根据楼盘分组
        $buildings = $this->groupByBuilding($houses);

        $buildingData = Building::whereIn('id', $buildings->keys())->with(['block', 'features', 'area', 'label', 'house'])->get();

        $data = $this->buildingDataComplete($buildings, $buildingData, $service);

        if (empty($whetherPage)) {
            $data = $data->forpage($request->page??1, 10);
            return Common::pageData($request->page, $data->values());
        } else {
            return $data->toArray();
        }
    }

    /**
     * 说明：图片、楼盘名、优标签、商圈、单价、符合条件的房源数量、特色
     *
     * @param $buildings
     * @param $buildingData
     * @return mixed
     * @author jacklin
     */
    public function buildingDataComplete($buildings, $buildingData, $service)
    {
        foreach ($buildingData as $index => $v) {
            // 特色,标签,地址
            $service->features($v);
            $service->getAddress($v);
            $service->label($v);

            // 房源数量
            $buildingData[$index]->house_count = $buildings[$v->id]->count();

            // 价格
            $buildingData[$index]->avg_price = (int)($buildings[$v->id]->avg('unit_price'));

            // 商圈推荐
            $buildingData[$index]->block_recommend = $v->block->recommend??0;

            // 标签
            $buildingData[$index]->building_label = !empty($v->label)?1:2;
        }

        // 排序
        $res = $buildingData->toArray();
        $block_recommend = array_column($res, 'block_recommend');
        $house_count = array_column($res, 'house_count');
        $building_label = array_column($res, 'building_label');
        array_multisort($building_label, SORT_ASC, $house_count, SORT_DESC, $block_recommend, SORT_DESC, $res);

        return collect($res);
    }

    /**
     * 说明: 根据条件 查询符合条件的房子 根据 楼盘分组
     *
     * @param $request
     * @param $building_id
     * @return mixed
     * @author jacklin
     */
    public function houseList($request, $building_id)
    {
        $buildings = Building::make();
        // 如果有商圈id 查商圈
        if (!empty($request->block_id)) {
            $buildings = $buildings->where('block_id', $request->block_id);
        } elseif(!empty($request->area_id)) {
            $buildings = Building::where('area_id', $request->area_id);
        }

        // 如果$building_id 不为空 则为精品推荐获取楼盘列表,否则为楼盘列表
        if (!empty($building_id)) {
            $buildings = $buildings::whereIn('id', $building_id)->get()->pluck('id')->toArray();
        } else {
            $buildings = $buildings->get()->pluck('id')->toArray();
        }

        // 特色
        if (!empty($request->features)) {

            // 取出包含其中一个的数据
            if (!is_array($request->features)) $request->features = array($request->features);
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
        $houses = OfficeBuildingHouse::whereIn('building_block_id', $buildingBlocks)->where('house_busine_state', 1);

        // 面积
        if (!empty($request->acreage)) $houses = $houses->whereBetween('constru_acreage', $request->acreage);

        if (!empty($request->total_price)) {
            // 总价
            $houses = $houses->whereBetween('total_price', $request->total_price);
        } elseif (!empty($request->unit_price)) {
            // 单价
            $houses = $houses->whereBetween('unit_price', $request->unit_price);
        }

        // 装修
        if (!empty($request->renovation)) $houses = $houses->where('renovation', $request->renovation);

        return $houses;
    }

    /**
     * 说明：房源集合根据楼盘分组
     *
     * @param $houses
     * @return mixed
     * @author jacklin
     */
    public function groupByBuilding($houses)
    {
        // 对楼座进行分组
        $buildingsBlocks = $houses->get()->groupBy('building_block_id');
        // 将房源根据
        $buildingsBlockIds = $buildingsBlocks->keys();
        $buildingsBlocksData = BuildingBlock::find($buildingsBlockIds);
        foreach ($buildingsBlocks as $index => $buildingsBlock) {
            // 当前的楼座
            $buildingBlockCurr = $buildingsBlocksData->find($index);
            $buildingsBlock->buildingId = $buildingBlockCurr->building_id;
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
    public function getShow($building, $service)
    {
        //楼盘单价区间
        $building->unit_price = intval($building->house->min('unit_price')) . '-' . intval($building->house->max('unit_price'));
        //楼盘总价区间
        $low_price = $building->house->min('total_price') / 10000;
        $high_price = $building->house->max('total_price') / 10000;
        $building->total_price= (is_int($low_price) ? $low_price : round($low_price, 1)) . '-' . (is_int($high_price) ? $high_price : round($high_price, 1));
        //楼盘面积区间
        $building->constru_acreage = intval($building->house->min('constru_acreage')) . '-' . intval($building->house->max('constru_acreage'));
        $service->features($building);
        $service->label($building);
        return $building;
    }

    /**
     * 说明: 获取该楼盘下的房源列表
     *
     * @param $id
     * @return mixed
     * @author 刘坤涛
     */
    public function OfficeHouseList($service, $id)
    {
       $building = Building::find($id);
       $res=  $building->house()->with('houseLabel', 'buildingBlock', 'buildingBlock.building')->paginate(6);
       foreach ($res as $v) {
           $service->getShow($v);
           $service->labelShow($v);
       }
       return $res;

    }

    /**
     * 说明: 楼盘分页列表
     *
     * @param $per_page
     * @param $condition
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 刘坤涛
     */
    public function buildingLists($per_page, $condition, $service)
    {
        $result = Building::with('buildingBlock', 'features', 'label', 'area', 'block')->orderBy('updated_at', 'desc');
        if (!empty($condition->building_id)) {
            $result = $result->where(['id' => $condition->building_id]);
        } elseif(!empty($condition->area_id)) {
            $buildingId = array_column(Area::find($condition->area_id)->building->flatten()->toArray(), 'id');
            $result = $result->whereIn('id', $buildingId);
        }
        $buildings = $result->paginate($per_page??10);
        foreach($buildings as $v) {
            $service->features($v);
            $service->label($v);
            $service->getAddress($v);
        }
        return $buildings;
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
        DB::connection('mysql')->beginTransaction();
        DB::connection('media')->beginTransaction();
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
                'album' => $request->album,

                'describe' => $request->describe
            ]);

            //添加楼座信息
            $buildingBlocks = $request->building_block;
            foreach ($buildingBlocks as $buildingBlock) {
                BuildingBlock::create([
                    'building_id' => $building->id,
                    'name' => $buildingBlock['name'],
                    'name_unit' => $buildingBlock['name_unit'],
                    'unit' => $buildingBlock['unit'],
                    'unit_unit' => $buildingBlock['unit_unit'],
                ]);
            }

            //添加楼盘特色
            $buildingFeatures = $request->building_feature;
            $res = BuildingHasFeature::where('building_id', $building->id)->whereIn('building_feature_id', $buildingFeatures)->get();
            if (!$res->isEmpty()) throw new \Exception('楼盘特色不能重复添加');

            foreach($buildingFeatures as $buildingFeature) {
                BuildingHasFeature::create([
                    'building_id' => $building->id,
                    'building_feature_id' => $buildingFeature
                ]);
            }
            DB::connection('mysql')->commit();
            DB::connection('media')->commit();
            return true;
        } catch (\Exception $e) {
            DB::connection('mysql')->rollBack();
            DB::connection('media')->rollBack();
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
        DB::connection('mysql')->beginTransaction();
        DB::connection('media')->beginTransaction();
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
             $building->describe = $request->describe;
            if (!$building->save()) throw new \Exception('楼盘修改失败');
            // 查询查该楼盘已经有的特色
            $features = BuildingHasFeature::where('building_id', $building->id)->pluck('building_feature_id')->toArray();
             // 获取要修改的特色
            $buildingFeatures = $request->building_feature;
            if (!empty($buildingFeatures)) {
                //修改特色-已有特色,得到要添加的特色
                $addFeature = array_diff($buildingFeatures, $features);
                if (!empty($addFeature)) {
                    $res = BuildingHasFeature::where('building_id', $building->id)->whereIn('building_feature_id', $addFeature)->get();
                    if (!$res->isEmpty()) throw new \Exception('楼盘特色不能重复添加');
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
            }
            DB::connection('mysql')->commit();
            DB::connection('media')->commit();
            return true;
        } catch (\Exception $e) {
            DB::connection('mysql')->rollBack();
            DB::connection('media')->rollBack();
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