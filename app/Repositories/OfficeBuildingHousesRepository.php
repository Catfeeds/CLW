<?php
namespace App\Repositories;

use App\Models\Area;
use App\Models\Block;
use App\Models\Building;
use App\Models\HouseLabel;
use App\Models\Houses;
use Illuminate\Database\Eloquent\Model;

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
        $house = Houses::find($id);
        if (empty($house)) {
            return ['status' => false, 'message' => '房源异常'];
        }

        // 查询这个房源周边房源
        $houses = Houses::with('buildingBlock.building', 'houseLabel')->where('id', '!=', $id)
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
     * @param $per_page
     * @param $condition
     * @param $service
     * @return mixed
     * @author 刘坤涛
     */
    public function HouseList($per_page, $condition, $service)
    {
        $result = Houses::where('house_busine_state', 1);
        if (!empty($condition->region) && !empty($condition->build)) {
            // 楼盘包含的楼座
            $blockId = array_column(Building::find($condition->build)->buildingBlock->toArray(), 'guid');
            $result = $result->whereIn('building_block_guid', $blockId);
        } elseif (!empty($condition->region) && empty($condition->build)) {
            // 区域包含的楼座
            $blockId = array_column(Area::find($condition->region)->building_block->flatten()->toArray(), 'guid');
            $result = $result->whereIn('building_block_guid', $blockId);
        }

        // 最小面积
        if (!empty($condition->min_acreage)) {
            $result = $result->where('constru_acreage', ">=", (int)$condition->min_acreage);
        }
        // 最大面积
        if (!empty($condition->max_acreage)) {
            $result = $result->where('constru_acreage', "<=", (int)$condition->max_acreage);
        }
        //房源编号
        if (!empty($condition->house_identifier)) {
            $result = $result->where('house_identifier',$condition->house_identifier);
        }
        //房号
        if(!empty($condition->house_number)) {
            $result = $result->where('house_number',$condition->house_number);
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
        return Houses::find($request->house_id)->update(['shelf' => 1]);
    }

    // 房源下架
    public function delShowHouse($id)
    {
        return Houses::find($id)->update(['shelf' => 2]);
    }

    public function getAgentInfo($house)
    {
        //获取该房源所属商圈id
        $block_guid = $house->buildingBlock->building->block_guid;
        return Block::find($block_guid);
    }

    public function officeBuildingHousesRecordList($request)
    {
        $id = $request->id;
        $idArr = explode(",",$id);
        return Houses::whereIn('id',$idArr)->with('buildingBlock.building.block.area')->get();
    }
}