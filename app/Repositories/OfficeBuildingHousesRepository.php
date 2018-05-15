<?php
namespace App\Repositories;

use App\Models\HouseLabel;
use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeBuildingHouse;

class OfficeBuildingHousesRepository extends Model
{
    /**
     * 说明: 房源详情
     *
     * @param $office
     * @return mixed
     * @author 罗振
     */
    public function getShow($office)
    {
        $office->total_floor = $office->buildingBlock->total_floor;
        $office->property_company = $office->buildingBlock->property_company;
        $office->passenger_lift = $office->buildingBlock->passenger_lift;
        $office->cargo_lift = $office->buildingBlock->cargo_lift;
        $office->president_lift = $office->buildingBlock->president_lift;
        return $office;
    }

    /**
     * 说明: 房源详情相关房源
     *
     * @param $id
     * @return array
     * @author 罗振
     */
    public function getShowOffice($id)
    {
        $house = OfficeBuildingHouse::find($id);
        if (empty($house)) {
            return ['status' => false, 'message' => '房源异常'];
        }

        // 查询这个房源周边房源
        return OfficeBuildingHouse::where('id', '!=', $id)
            ->where('constru_acreage', '>', $house->constru_acreage - config('setting.float_acreage'))
            ->where('constru_acreage', '<', $house->constru_acreage + config('setting.float_acreage'))
            ->where('unit_price', '>', $house->unit_price - config('setting.float_price'))
            ->where('unit_price', '<', $house->unit_price + config('setting.float_price'))
            ->paginate(6);
    }

    /**
     * 说明: 获取房源列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function HouseList()
    {
        return OfficeBuildingHouse::all();
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
            'house_id' => $request->house_id
        ]);
    }

}