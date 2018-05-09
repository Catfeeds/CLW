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
     * 说明:查询周边房源
     *
     * @param $id
     * @return mixed
     * @author 王成
     */
    public function getShowOffice($id)
    {
        $office = OfficeBuildingHouse::find($id);

        // 总面积/取出单价
        $constru_acreage = $office->constru_acreage;
        $unit_price = $office->unit_price_cn;
        // 因为有追加字段变成数组
        $arr = OfficeBuildingHouse::paginate(6)->toArray();
        //变成集合
        $res = collect($arr)->where('unit_price_cn', '>', $unit_price - config('setting.float_price'))
            ->where('unit_price_cn', '<', $unit_price + config('setting.float_price'))
            ->where('total_acreage', '>', $constru_acreage - config('setting.float_acreage'))
            ->where('total_acreage', '<', $constru_acreage + config('setting.float_acreage'));

        return $res;

    }
}