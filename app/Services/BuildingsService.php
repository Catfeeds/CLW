<?php

namespace App\Services;


class BuildingsService
{
    /**
     * 说明: 获取楼盘特色数据
     *
     * @param $res
     * @author 刘坤涛\
     */
    public function features($res)
    {
        //楼盘特色数组 只显示前3条
        $res->feature = $res->features->pluck('name')->take(3)->toArray();
        //楼盘特色 固定格式显示
        $res->feature_cn = $res->features->pluck('name', 'id')->toArray();
        //楼盘特色对应图片,名称格式
        $res->feature_name_pic = $res->features->map(function($v) {
            return [
                'name' => $v->name,
                'pic' => config('setting.qiniu_url') . $v->pic
            ];
        });
    }

    /**
     * 说明: 楼盘是否有标签
     *
     * @param $res
     * @author 刘坤涛
     */
    public function label($res)
    {
        if ($res->label) {
            $res->label_cn = true;
        } else {
            $res->label_cn = false;
        }
    }

    /**
     * 说明: 获取楼盘对应地址商圈名称格式
     *
     * @param $res
     * @author 刘坤涛
     */
    public function getAddress($res)
    {
        //商圈名称 - 链接
        $res->address_cn = $res->area->name . '-' . $res->block->name;
        //商圈名称 / 链接
        $res->address_type = $res->area->name . '/' . $res->block->name;
    }

    /**
     * 说明: 推荐楼盘获取楼盘名称
     *
     * @param $res
     * @author 刘坤涛
     */
    public function getName($res)
    {
        $res->building_name = $res->building->name;
    }

    /**
     * 说明: 获取楼盘id,区域id,城市id数组
     *
     * @return array
     * @author 刘坤涛
     */
    public function getArrId($res)
    {

        $data[] =  $res->building->area->city->id;
        $data[] = $res->building->area->id;
        $data[] = $res->building->id;
        $res->array_id_cn = $data;
    }

    /**
     * 说明: 推荐楼盘获取区域商圈地址
     *
     * @param $res
     * @author 刘坤涛
     */
    public function getBuildingAddress($res)
    {
        $res->address_cn = $res->building->area->name . '-' . $res->building->block->name;
    }
}