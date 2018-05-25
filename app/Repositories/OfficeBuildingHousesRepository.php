<?php
namespace App\Repositories;

use App\Models\Area;
use App\Models\Building;
use App\Models\HouseLabel;
use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeBuildingHouse;

class OfficeBuildingHousesRepository extends Model
{
    /**
     * 说明: 房源详情相关房源
     *
     * @param $service
     * @param $id
     * @return array|\Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 罗振
     */
    public function getShowOffice($service, $id)
    {
        $house = OfficeBuildingHouse::find($id);
        if (empty($house)) {
            return ['status' => false, 'message' => '房源异常'];
        }

        // 查询这个房源周边房源
        $houses = OfficeBuildingHouse::with('buildingBlock.building', 'houseLabel')->where('id', '!=', $id)
            ->where('constru_acreage', '>', $house->constru_acreage - config('setting.float_acreage'))
            ->where('constru_acreage', '<', $house->constru_acreage + config('setting.float_acreage'))
            ->where('unit_price', '>', $house->unit_price - config('setting.float_price'))
            ->where('unit_price', '<', $house->unit_price + config('setting.float_price'))
            ->paginate(6);
        foreach ($houses as $v) {
            $service->getShow($v);
            $service->labelShow($v);
        }
        return $houses;
    }

    /**
     * 说明: 获取房源列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function HouseList($per_page, $condition, $service)
    {
        $result = OfficeBuildingHouse::where('house_busine_state', 1);
        if (!empty($condition->region) && !empty($condition->build)) {
            // 楼盘包含的楼座
            $blockId = array_column(Building::find($condition->build)->buildingBlock->toArray(), 'id');
            $result = $result->whereIn('building_block_id', $blockId);
        } elseif (!empty($condition->region) && empty($condition->build)) {
            // 区域包含的楼座
            $blockId = array_column(Area::find($condition->region)->building_block->flatten()->toArray(), 'id');
            $result = $result->whereIn('building_block_id', $blockId);
        }

        // 最小面积
        if (!empty($condition->min_acreage)) {
            $result = $result->where('constru_acreage', ">=", (int)$condition->min_acreage);
        }
        // 最大面积
        if (!empty($condition->max_acreage)) {
            $result = $result->where('constru_acreage', "<=", (int)$condition->max_acreage);
        }

        // 排序
        if (!empty($condition->order)) {
            $result = $result->orderBy('updated_at', $condition->order);
        }
        $house =  $result->with('buildingBlock', 'buildingBlock.building', 'houseLabel')->paginate($per_page??10);
        foreach($house as $v) {
            $service->labelShow($v);
            $service->getBuildingName($v);
        }
        return $house;
    }

    /**
     * 说明: 添加房源标签
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addHouseLabel($request)
    {
        return HouseLabel::create([
            'house_id' => $request->house_id,
        ]);
    }

    /**
     * 说明: 房源上架
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function showHouse($request)
    {
        return OfficeBuildingHouse::find($request->house_id)->update(['shelf' => 1]);
    }

    /**
     * 说明: 房源下架
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function delShowHouse($id)
    {
        return OfficeBuildingHouse::find($id)->update(['shelf' => 2]);
    }

}