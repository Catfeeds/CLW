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


    }
}