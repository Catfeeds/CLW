<?php
namespace App\Repositories;

use App\Handler\Common;
use App\Models\Area;
use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\BuildingFeature;
use App\Models\BuildingHasFeature;
use App\Models\BuildingKeywords;
use App\Models\BuildingLabel;
use App\Models\OfficeBuildingHouse;
use App\Services\BuildingKeywordService;
use App\Services\BuildingsService;
use App\Services\CustomPage;
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
     * @param null $getCount
     * @param null $mapRes  地图返回结果
     * @param null $pcBuildingListAndMap  地图返回结果
     * @return array
     * @author 罗振
     */
    public function buildingList(
        $request,
        $service,
        $building_id = null,
        $whetherPage = null,
        $getCount = null,
        $mapRes = null,
        $pcBuildingListAndMap = null
    )
    {
        $houses = $this->houseList($request, $building_id, $pcBuildingListAndMap);

        // 根据楼盘分组
        $buildings = $this->groupByBuilding($houses);

        $buildingData = Building::whereIn('id', $buildings->keys())->with(['block', 'features', 'area.areaLocation', 'label', 'house'])->get();

        // pc价格排序
        if (!empty($request->price_sort)) {
            $data = $this->buildingDataComplete($buildings, $buildingData, $service, $request->price_sort);
        } else {
            $data = $this->buildingDataComplete($buildings, $buildingData, $service);
        }

        // 楼盘总数
        $total = $data->count();

        // 总页数
        $totalPage = ceil($total / 10);

        if (empty($whetherPage)) {
            $data = $data->forpage($request->page??1, 10);
            return Common::pageData($request->page, $data->values(), $total);
        } elseif ($getCount) {
            $data = $data->forpage($request->nowPage??1, 10);
            // 搜索高亮
            if (!empty($request->keyword)) $data = $service->highlight($data, $request->keyword);
            $customPage = new CustomPage();
            $baseUrl = url('/building_list');
            $page = $customPage->getSelfPageView($request->nowPage??1, $totalPage, $baseUrl, $request->data);
            return [
                'house_count' => $houses->count(),
                'page' => $page,
                'data' => $data
            ];
        } elseif ($mapRes) {
            return $data->values()->toArray();
        } else {
            return $data->toArray();
        }
    }

    /**
     * 说明: 图片、楼盘名、优标签、商圈、单价、符合条件的房源数量、特色
     *
     * @param $buildings
     * @param $buildingData
     * @param $service
     * @param null $priceSort
     * @return \Illuminate\Support\Collection
     * @author 罗振
     */
    public function buildingDataComplete(
        $buildings,
        $buildingData,
        $service,
        $priceSort = null
    )
    {
        foreach ($buildingData as $index => $v) {
            $buildingData[$index]->pc_house = $v->house->take(5)->toArray();

            // 价格及面积区间
            $service->priceAndAcreageSection($v);

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

            $buildingData[$index]->orderByLabel = !empty($v->label)?2:1;

            $v->setRelation('house',collect());
        }

        if (empty($priceSort)) {
            // 默认排序方式
            $res = collect($buildingData)->sortByDesc(function ($val) {
                return [$val->orderByLabel, $val->house_count, $val->block_recommend];
            });
        } else {
            // pc端价格排序
            if ($priceSort == 'asc') {
                $res = collect($buildingData)->sortBy(function ($val) use ($priceSort) {
                    return [$val->avg_price];
                });
            } else {
                $res = collect($buildingData)->sortByDesc(function ($val) use ($priceSort) {
                    return [$val->avg_price];
                });
            }
        }

        return collect($res);
    }

    /**
     * 说明: 根据条件 查询符合条件的房子 根据 楼盘分组
     *
     * @param $request
     * @param $building_id
     * @param null $pcBuildingList
     * @return mixed
     * @author jacklin
     */
    public function houseList(
        $request,
        $building_id,
        $pcBuildingList = null
    )
    {
        $buildings = Building::make();

        // 如果有商圈id 查商圈
        if (!empty($request->block_id)) {
            $buildings = $buildings->where('block_id', $request->block_id);
        } elseif(!empty($request->area_id)) {
            $buildings = Building::where('area_id', $request->area_id);
        }

        // 如果$building_id 不为空 则为精品推荐获取楼盘列表,否则为楼盘列表
        if (!empty($building_id) || (empty($building_id) && $pcBuildingList)) {
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

            // 获取交集
            $buildings = array_intersect($buildings, $featureBuildings);
        }

        // 筛选出符合条件的楼座
        $buildingBlocks = BuildingBlock::whereIn('building_id', $buildings)->pluck('id')->toArray();
        $houses = OfficeBuildingHouse::whereIn('building_block_id', $buildingBlocks)->where('house_busine_state', 1)->where('shelf', 1);

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
        $buildingsBlockIds = $buildingsBlocks->keys();  // 返回所有的键值
        $buildingsBlocksData = BuildingBlock::find($buildingsBlockIds); //  获取所有楼座数据

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
     * @param $service
     * @return mixed
     * @author 罗振
     */
    public function getShow($building, $service)
    {
        $service->priceAndAcreageSection($building);
        $service->features($building);
        $service->label($building);
        $service->companyString($building);
        return $building;
    }

    /**
     * 说明: 获取该楼盘下的房源列表
     *
     * @param $service
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

    // 楼盘分页列表
    public function buildingLists(
        $request,
        $condition,
        $service
    )
    {
        $result = Building::with('buildingBlock', 'features', 'label', 'area', 'block');
        if (!empty($condition->building_guid)) {
            $result = $result->where(['guid' => $condition->building_guid]);
        } elseif(!empty($condition->area_guid)) {
            $buildingGuid = array_column(Area::find($condition->area_guid)->building->flatten()->toArray(), 'guid');
            $result = $result->whereIn('guid', $buildingGuid);
        }

        $buildings = $result->get();

        foreach($buildings as $v) {
            $service->features($v);
            $service->label($v);
            $service->getAddress($v);
            $v->label_sort = empty($v->label)?1:2;
        }

        $data = collect($buildings)->sortByDesc(function ($val) {
            return [$val->label_sort, $val->updated_at];
        })->forpage($request->page??1, $request->per_page??10);

        return Common::pageData($request->page, $data->values(), $buildings->count());
    }

    // 添加楼盘标签
    public function addBuildingLabel($request)
    {
        return BuildingLabel::create([
            'building_guid' => $request->building_guid
        ]);
    }

    // 修改楼盘信息
    public function updateBuilding($request, $building)
    {
        \DB::beginTransaction();
        try {
            // 查询查该楼盘已经有的特色
            $features = BuildingHasFeature::where('building_guid', $building->guid)->pluck('building_feature_id')->toArray();
            // 获取要修改的特色
            $buildingFeatures = $request->building_feature;
            if (!empty($buildingFeatures)) {
                //修改特色-已有特色,得到要添加的特色
                $addFeature = array_diff($buildingFeatures, $features);
                if (!empty($addFeature)) {
                    $res = BuildingHasFeature::where('building_guid', $building->guid)->whereIn('building_feature_id', $addFeature)->get();
                    if (!$res->isEmpty()) throw new \Exception('楼盘特色不能重复添加');
                    foreach($addFeature as $v) {
                        BuildingHasFeature::create([
                            'building_guid' => $building->guid,
                            'building_feature_id' => $v
                        ]);
                    }
                }
                //已有特色-修改特色,得到要删除的特色
                $delFeature = array_diff($features, $buildingFeatures);
                if (!empty($delFeature)) {
                    foreach($delFeature as $v) {
                        BuildingHasFeature::where([
                            'building_guid' => $building->guid,
                            'building_feature_id' => $v
                        ])->delete();
                    }
                }
            }
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
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

    //获取精选写字楼
    public function getEliteBuilding()
    {
        $service = new BuildingsService();
        $buildingIds = BuildingLabel::orderBy('created_at','asc')->get()->pluck('building_id')->toArray();

        if (empty($buildingIds)) return collect();

        $res = Building::with('house','area','block')->whereIn('guid', $buildingIds)->orderByRaw("FIELD(guid, " . implode(", ", $buildingIds) . ")")->get();
        foreach ($res as $v) {
            $service->getAddress($v);
            $house[] = $v->house;
            foreach ($house as $value) {
                $v->avg_price = $service->getBuildingAveragePrice($value);
            }
        }
        return $res;
    }

    //获取楼盘记录列表
    public function buildingRecordList($request)
    {
        $id = $request->id;
        $idArr = explode(",",$id);
        return Building::whereIn('guid',$idArr)->with('block','area')->get();
    }
}