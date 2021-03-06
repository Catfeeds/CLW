<?php

namespace App\Services;

use App\Handler\Common;
use App\Models\Area;
use App\Models\Block;
use App\Repositories\BuildingsRepository;

class MapsService
{
    // 获取地铁站点楼盘数量
    public function getPeripheryBuildingsCount($request)
    {
        $datas = array();
        foreach ($request->gps as $key => $gps) {
            $gps = json_decode($gps);
            $y = $gps->y;
            $x = $gps->x;
            $name = $gps->name;

            $count = \DB::select("select count(*) as count from buildings.buildings where sqrt( ( ((".$x."-x)*PI()*12656*cos(((".$y."+y)/2)*PI()/180)/180) * ((".$x."-x)*PI()*12656*cos (((".$y."+y)/2)*PI()/180)/180) ) + ( ((".$y."-y)*PI()*12656/180) * ((".$y."-y)*PI()*12656/180) ) )/2 < ".$request->distance);
            $datas[$key]['num'] = $count[0]->count;
            $datas[$key]['name'] = $name;
            $datas[$key]['x'] = $x;
            $datas[$key]['y'] = $y;
        }

        return $datas;
    }
    
    // 根据当前gps指定距离获取周边楼盘
    public function getPeripheryBuildings(
        $request,
        BuildingsRepository $repository,
        BuildingsService $buildingsService
    )
    {
        $buildings = array();
        foreach ($request->gps as $gps) {
            $gps = json_decode($gps);
            $y = $gps->y;
            $x = $gps->x;

            // 获取gps范围里面所有楼盘id
            $res = \DB::select("select guid from buildings.buildings where sqrt( ( ((".$x."-x)*PI()*12656*cos(((".$y."+y)/2)*PI()/180)/180) * ((".$x."-x)*PI()*12656*cos (((".$y."+y)/2)*PI()/180)/180) ) + ( ((".$y."-y)*PI()*12656/180) * ((".$y."-y)*PI()*12656/180) ) )/2 < ".$request->distance);

            $buildings[] = Common::objectToArray(collect($res)->toArray());
        }

        // 获取去重之后的所有楼盘id
        $buildingsId = array_column($this->remove_duplicate(collect($buildings)->collapse()->all()),'guid');
        // 获取所有/分页
        if ($request->type == 'all') {
            $whetherPage = true;
        } else {
            $whetherPage = false;
        }

        return $repository->buildingList($request, $buildingsService, $buildingsId, $whetherPage,null, true,true);
    }

    // 数组去重
    public function remove_duplicate($datas)
    {
        $result = array();
        foreach ($datas as $key => $value) {
            $has = false;
            foreach ($result as $val) {
                if ($val['guid'] == $value['guid']) {
                    $has = true;
                    break;
                }
            }
            if (!$has) $result[] = $value;
        }

        return $result;
    }

    // 通过楼盘获取商圈
    public function getBuildingArea($buildings)
    {
        $temp = array();
        foreach ($buildings['data'] as $k => $v) {
            $temp[] = $v['area'];
        }

        $temp = $this->remove_duplicate($temp);

        $result = array();
        foreach ($temp as $key => $val) {
            $result[$key]['guid'] = $val['guid'];
            $result[$key]['name'] = $val['name'];
            $result[$key]['x'] = $val['area_location']['x'];
            $result[$key]['y'] = $val['area_location']['y'];
            $result[$key]['baidu_coord'] = $val['area_location']['scope'];
            $result[$key]['building_num'] = $val['area_location']['building_num'];
        }

        return $result;
    }


    // 获取区域地理位置信息
    public function getAreaLocationsList()
    {
        $areas = Area::with('areaLocation')->get();

        $datas = array();
        foreach ($areas as $k => $v) {
            $datas[$k]['guid'] = $v->guid;
            $datas[$k]['name'] = $v->name;
            $datas[$k]['x'] = $v->areaLocation->x;
            $datas[$k]['y'] = $v->areaLocation->y;
            $datas[$k]['baidu_coord'] = $v->areaLocation->scope;
            $datas[$k]['building_num'] = $v->areaLocation->building_num;
        }

        return $datas;
    }

    // 获取商圈地理位置信息
    public function getBlockLocationsList()
    {
        $blocks = Block::with('blockLocation')->get();

        $datas = array();
        foreach ($blocks as $k => $v) {
            $datas[$k]['guid'] = $v->guid;
            $datas[$k]['name'] = $v->name;
            $datas[$k]['x'] = empty($v->blockLocation)?'':$v->blockLocation->x;
            $datas[$k]['y'] = empty($v->blockLocation)?'':$v->blockLocation->y;
            $datas[$k]['baidu_coord'] = empty($v->blockLocation)?'':$v->blockLocation->scope;
            $datas[$k]['building_num'] = empty($v->blockLocation)?'':$v->blockLocation->building_num;
        }

        return $datas;
    }

}