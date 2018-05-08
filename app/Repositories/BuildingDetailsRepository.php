<?php
namespace App\Repositories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Model;

class BuildingDetailsRepository extends Model
{
    /**
     * 说明: 获取详情
     *
     * @param $id
     * @return mixed
     * @author 王成
     */
    public function getShow($id)
    {
        $building = Building::find($id);
        $building->constru_acreage = 0; //平方
        $building->price = 0; //价格
        $building->station_number = 0;//工位数
        $constru_acreage=[];
        $price =[];
        $station_number = [];
        if(!empty($building->buildingBlock)) {
            foreach ($building->buildingBlock as $buildingBlock) {
                $OfficeBuildingHouse[] = $buildingBlock->OfficeBuildingHouse;
            }
                $houses = collect($OfficeBuildingHouse)->flatten()->toArray();
            foreach ($houses as $vv) {
                    $constru_acreage[] = (int)$vv['constru_acreage'];
                    if ($vv['rent_price_unit'] == 2) {
                    $price[] = (int)$vv['rent_price'];
                    }
                    if(!empty($vv['station_number'])) {
                    $station_number[] = (int)$vv['station_number'];
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
}