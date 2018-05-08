<?php

namespace App\Repositories;

use App\Models\HouseLabel;
use App\Models\OfficeBuildingHouse;
use Illuminate\Database\Eloquent\Model;

class HousesRepository extends Model
{
    /**
     * 说明: 获取房源列表
     *
     * @return mixed
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