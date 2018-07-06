<?php

namespace App\Services;

use App\Handler\Common;

class MapsService
{
    // 根据当前gps指定距离获取周边楼盘
    public function getPeripheryBuildings($request)
    {
        $buildings = array();
        foreach ($request->gps as $gps) {
            $y = $gps['y'];
            $x = $gps['x'];

            // 此查询无排序
            $res = \DB::select("select * from media.buildings where sqrt( ( ((".$x."-x)*PI()*12656*cos(((".$y."+y)/2)*PI()/180)/180) * ((".$x."-x)*PI()*12656*cos (((".$y."+y)/2)*PI()/180)/180) ) + ( ((".$y."-y)*PI()*12656/180) * ((".$y."-y)*PI()*12656/180) ) )/2 < ".$request->distance);

            $buildings[] = Common::objectToArray(collect($res)->toArray());
        }

        $buildings = collect($buildings)->collapse()->all();

        array_unique($buildings);

        dump($buildings);


//        $y =  $request->y; //当前坐标y
//        $x = $request->x; //当前坐标x
//        $distance = $request->distance; //5公里以内的信息，这里的5公里为半径。
//
//        // 此查询无排序
//        $sql = "select * from media.buildings where sqrt( ( ((".$x."-x)*PI()*12656*cos(((".$y."+y)/2)*PI()/180)/180) * ((".$x."-x)*PI()*12656*cos (((".$y."+y)/2)*PI()/180)/180) ) + ( ((".$y."-y)*PI()*12656/180) * ((".$y."-y)*PI()*12656/180) ) )/2 < ".$distance;
//
//        return \DB::select($sql);
    }

}