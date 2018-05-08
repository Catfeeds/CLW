<?php
namespace App\Repositories;

use App\Models\Building;
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
        $buildings = Building::paginate(20);
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
                if ($house['rent_price_unit'] == 2) {
                    $number++;
                    $price += $house->rent_price;
                }
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

}