<?php

namespace App\Services;

use App\Handler\Common;
use App\Models\Area;

class MapsService
{
    // 根据当前gps指定距离获取周边楼盘
    public function getPeripheryBuildings($request)
    {
        $buildings = array();
        foreach ($request->gps as $gps) {
            $gps = json_decode($gps);
            $y = $gps->y;
            $x = $gps->x;

            $res = \DB::select("select * from media.buildings where sqrt( ( ((".$x."-x)*PI()*12656*cos(((".$y."+y)/2)*PI()/180)/180) * ((".$x."-x)*PI()*12656*cos (((".$y."+y)/2)*PI()/180)/180) ) + ( ((".$y."-y)*PI()*12656/180) * ((".$y."-y)*PI()*12656/180) ) )/2 < ".$request->distance);

            $buildings[] = Common::objectToArray(collect($res)->toArray());
        }

        // 将结果的多维数组转换为一维数组
        $buildings = collect($buildings)->collapse()->all();

        return $this->remove_duplicate($buildings);
    }

    // 楼盘去重
    public function remove_duplicate($datas)
    {
        $result = array();
        foreach ($datas as $key => $value) {
            $has = false;
            foreach ($result as $val) {
                if ($val['id'] == $value['id']) {
                    $has = true;
                    break;
                }
            }
            if (!$has) $result[] = $value;
        }

        return $result;
    }

    public function getRegionList()
    {
        $areas = Area::with('areaLocation')->get();

        $datas = array();
        foreach ($areas as $k => $v) {
            $datas[$k]['name'] = $v->name;
            $datas[$k]['x'] = $v->areaLocation->x;
            $datas[$k]['y'] = $v->areaLocation->y;
            $datas[$k]['scope'] = $v->areaLocation->scope;
            $datas[$k]['building_num'] = $v->areaLocation->building_num;
        }

        return $datas;
    }
}