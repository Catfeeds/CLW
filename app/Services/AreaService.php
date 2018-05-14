<?php

namespace App\Services;

use App\Models\Area;

class AreaService
{
    /**
     * 说明: 获取所有商圈
     *
     * @return array
     * @author 罗振
     */
    public function allBuildingBlock()
    {
        // 获取所有区域
        $areas = Area::get();

        $data = array();
        foreach ($areas as $area) {
            $block_box = array();
            foreach ($area->block as $block) {
                $res['id'] = $block->id;
                $res['name'] = $block->name;
                $res['recommend'] = $block->recommend;
                $block_box[] = $res;
            }
            $temp['area_name'] = $area->name;
            $temp['block'] = $block_box;
            $data[] = $temp;
        }

        return $data;
    }
}