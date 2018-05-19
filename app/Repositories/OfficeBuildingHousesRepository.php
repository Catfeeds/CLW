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
    public function HouseList($request)
    {
        $result = OfficeBuildingHouse::where('house_busine_state', 1);
        if (!empty($request->region) && !empty($request->build)) {
            // 楼盘包含的楼座
            $blockId = array_column(Building::find($request->build)->buildingBlocks->toArray(), 'id');
            $result = $result->whereIn('building_block_id', $blockId);
        } elseif (!empty($request->region) && empty($request->build)) {
            // 区域包含的楼座
            $blockId = array_column(Area::find($request->region)->building_block->flatten()->toArray(), 'id');
            $result = $result->whereIn('building_block_id', $blockId);
        }

        // 最小面积
        if (!empty($request->min_acreage)) {
            $result = $result->where('constru_acreage', ">=", (int)$request->min_acreage);
        }
        // 最大面积
        if (!empty($request->max_acreage)) {
            $result = $result->where('constru_acreage', "<=", (int)$request->max_acreage);
        }

        // 排序
        if (!empty($request->order)) {
            $result = $result->orderBy('updated_at', $request->order);
        }

        return $result->paginate($per_page??10);
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
            'status' => 1
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
        return HouseLabel::caeate([
            'status' => 1
        ]);
    }

}