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
     * @param $id
     * @return array
     * @author 罗振
     */
    public function getShowOffice($service, $id)
    {
        $house = OfficeBuildingHouse::find($id);
        if (empty($house)) {
            return ['status' => false, 'message' => '房源异常'];
        }

        // 查询这个房源周边房源
        $houses = OfficeBuildingHouse::where('id', '!=', $id)
            ->where('constru_acreage', '>', $house->constru_acreage - config('setting.float_acreage'))
            ->where('constru_acreage', '<', $house->constru_acreage + config('setting.float_acreage'))
            ->where('unit_price', '>', $house->unit_price - config('setting.float_price'))
            ->where('unit_price', '<', $house->unit_price + config('setting.float_price'))
            ->with(['BuildingBlock', 'HouseLabel'])
            ->paginate(6);
        foreach ($houses as $house) {
            $house->label_cn = !empty($house->house_label);
            $service->getShow($house);
        }
        return $houses;
    }

    /**
     * 说明: 获取房源列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function HouseList($per_page, $condition)
    {
        $result = OfficeBuildingHouse::where('house_busine_state', 1);
        if (!empty($condition->region) && !empty($condition->build)) {
            // 楼盘包含的楼座
            $blockId = array_column(Building::find($condition->build)->buildingBlocks->toArray(), 'id');
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
        $house =  $result->with('BuildingBlock', 'BuildingBlock.Building')->paginate($per_page??10);
        foreach($house as $v) {
            $v->building_name = $v->BuildingBlock->Building->name;
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
            'label' => 1
        ]);
    }

    /**
     * 说明: 更新房源标签
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function updateHouseLabel($request)
    {
        return HouseLabel::where('house_id', $request->house_id)->update(['label' => 1]);
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
        return HouseLabel::caeate([
            'house_id' => $request->house_id,
            'status' => 1
        ]);
    }

    /**
     * 说明: 更新房源上架
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function updateShowHouse($request)
    {
        return HouseLabel::where('house_id', $request->house_id)->update(['status' =>1]);
    }

}