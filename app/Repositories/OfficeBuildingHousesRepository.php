<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use App\Models\OfficeBuildingHouse;

class OfficeBuildingHousesRepository extends Model
{
    /**
     * 说明: 查询房源
     *
     * @param $office
     * @return mixed
     * @author 王成
     */
    public function getShow($office)
    {
        $office->buildings = $office->BuildingBlock->Building;
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
}