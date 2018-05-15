<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;

class BlocksService
{
    /**
     * 说明: 获取所有商圈信息
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 罗振
     */
    public function getAllBlocks()
    {
        return Block::all();
    }

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
            $blocks = Block::where('area_id', $area->id)->orderBy('recommend', 'desc')->get();
            foreach ($blocks as $block) {
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