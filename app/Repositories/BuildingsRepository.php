<?php
namespace App\Repositories;

use App\Models\Building;
use App\Models\OfficeBuildingHouse;
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

    /**
     * 说明: 获取详情
     *
     * @param $building
     * @return mixed
     * @author 王成
     */
    public function getShow($building)
    {
        $constru_acreage=[];
        $price =[];
        $station_number = [];
        if(!empty($building->buildingBlock)) {
            foreach ($building->buildingBlock as $buildingBlock) {
                $OfficeBuildingHouse[] = $buildingBlock->OfficeBuildingHouse;
            }

            $houses = collect($OfficeBuildingHouse)->flatten()->toArray();

            foreach ($houses as $house) {
                $constru_acreage[] = (int)$house['constru_acreage'];

                if ($house['rent_price_unit'] == 2) {
                    $price[] = (int)$house['rent_price'];
                }

                if(!empty($house['station_number'])) {
                    $station_number[] = (int)$house['station_number'];
                }
            }

            sort($constru_acreage);
            if(!empty($price)){
                //价格区间
                sort($price);
                $building->price = reset($price) . '-' . end($price);
            }
            //工位数
            if(!empty($station_number)){
                sort($station_number);
                $building->station_number = reset($station_number) . '-' . end($station_number);
            }
            //建筑面积
            $building->constru_acreage = reset($constru_acreage) . '-' . end($constru_acreage);
        }

        return $building;
    }

    /**
     * 说明: 获取详情
     *
     * @param $id
     * @return mixed
     * @author 王成
     */
    public function getShowOffice($id)
    {
        $building = Building::find($id);
        $arrId = [];
        foreach($building->buildingBlock as $buildingBlock) {
           $OfficeBuildingHouse[] = $buildingBlock->OfficeBuildingHouse;
        }

        $houses = collect($OfficeBuildingHouse)->flatten()->toArray();

        foreach($houses as $getId)
        {
            $arrId[] = $getId['id'];
        }

        $res = OfficeBuildingHouse::whereIn('id', $arrId)->paginate(6);

        foreach ($res as $office)
        {
            if($office->rent_price_unit == 2 && !empty($office->constru_acreage) && !empty($office->rent_price))
            {
                // 总价
                $office->priceArr = $office->rent_price*$office->constru_acreage.'元/月';
                // 单价
                $office->unitPrice =$office->rent_price.'元/㎡.月';
            } elseif ($office->rent_price_unit == 1 && !empty($office->constru_acreage) && !empty($office->rent_price)) {
                // 总价
                $office->priceArr = $office->rent_price.'元/月';
                // 单价
                $office->unitPrice = $office->constru_acreage/$office->priceArr.'元/㎡.月';
            } else {
                $office->priceArr = 0;
                $office->unitPrice = 0;
            }
        }

        return $res;
    }
}