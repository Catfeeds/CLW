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
        $areas = Area::with('block.relBlock')->get();

        $data = array();
        foreach ($areas as $area) {
            $block_box = array();
            $blocks = $area->block;
            foreach ($area->block as $block) {
                $block->recommend = empty($block->relBlock)?'':$block->relBlock->recommend;
            }

            $blocks = collect($blocks)->sortByDesc('recommend');
            foreach ($blocks as $block) {
                $res['guid'] = $block->guid;
                $res['name'] = $block->name;
                $res['recommend'] = empty($block->relBlock)?'':$block->relBlock->recommend;
                $block_box[] = $res;
            }

            $temp['area_name'] = $area->name;
            $temp['block'] = $block_box;
            $data[] = $temp;
        }
        return $data;
    }
}