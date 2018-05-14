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

    /**
     * 说明: 找房列表区域搜索条件
     *
     * @return array
     * @author 罗振
     */
    public function findHouse()
    {
        // 获取所有推荐商圈
        $recommendBlocks = Block::where('recommend', '!=', null)->withCount('building')->get();

        // 推荐商圈数据
        $recommendBlocksData = array();
        $recommendBlocksData['name'] = '推荐';
        $recommendBlocksData['area_id'] = 'all';
        $blocks = array();
        $blocks[0]['name'] = '全部区域';
        $blocks[0]['block_id'] = 'all';
        $blocks[0]['building_count'] = '';
        foreach ($recommendBlocks as $k => $v) {
            $blocks[$k+1]['name'] = $v->name;
            $blocks[$k+1]['block_id'] = $v->id;
            $blocks[$k+1]['building_count'] = $v->building_count;
        }

        $recommendBlocksData['block_list'] = $blocks;

        // 通过区域获取商圈
        $areas = Area::all();
        foreach ($areas as $k => $area) {
            $res[$k+1]['name'] = $area->name;
            $res[$k+1]['area_id'] = $area->id;
            // 获取楼盘数据
            $block_list = array();
            $blockDatas = Block::where('area_id', $area->id)->withCount('building')->get();

            $i = 0;
            foreach ($blockDatas as $key => $val) {
                \Log::info($i++);

                // 拼接数据
                $block_list[0]['name'] = '';
                $block_list[0]['block_id'] = 'all';
                $block_list[0]['building_count'] = '';

                $block_list[$key+1]['name'] = $val->name;
                $block_list[$key+1]['block_id'] = $val->id;
                $block_list[$key+1]['building_count'] = $val->building_count;
            }

            $res[$k+1]['block_list'] = $block_list;
        }

        return array_prepend($res, $recommendBlocksData);
    }
}