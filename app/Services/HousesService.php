<?php

namespace App\Services;

use App\Models\OfficeBuildingHouse;

class HousesService
{
    /**
     * 说明: 房源相关信息
     *
     * @param $res
     * @return mixed
     * @author 刘坤涛
     */
    public function HouseInfo($res)
    {
        foreach ($res as $v) {
            $house = OfficeBuildingHouse::where('id', $v->house_id)->first();
            //房源标题
            $v->house_title = $house->title;
            //房源面积
            $v->acreage = $house->getConstruAcreageCnAttribute();
            //单价
            $v->unit_proce = $house->getUnitPriceCnAttribute();
            //总价
            $v->total_price = $house->getTotalPriceCnAttribute();
            //特色
            $v->feature = $house->getHouseFeatureAttribute();
            //标签
            $v->label = $house->getLabelCnAttribute();
            //图片
            $v->img = $house->getIndoorImgCnAttribute();
        }
        return $res;
    }
}