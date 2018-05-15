<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\HouseFeature;

class OfficeBuildingHousesService
{
    /**
     * 说明: 找房列表区域搜索条件
     *
     * @return array
     * @author 罗振
     */
    public function blockCondition()
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

            foreach ($blockDatas as $key => $val) {
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

    /**
     * 说明: 找房列表其他搜索条件
     *
     * @return array
     * @author 罗振
     */
    public function otherCondition()
    {
        // 获取所有装修情况
        $renovation = [
            [
                'name' => '不限',
                'id' => 'all',
            ],
            [
                'name' => '豪华装修',
                'id' => 1,
            ],
            [
                'name' => '精装修',
                'id' => 2,
            ],
            [
                'name' => '中装修',
                'id' => 3,
            ],
            [
                'name' => '间装修',
                'id' => 4,
            ],
            [
                'name' => '毛坯',
                'id' => 5,
            ]
        ];

        // 特色
        $features = HouseFeature::orderBy('weight', 'desc')->get();
        $data = array();
        $temp = array();
        $temp[0]['name'] = '不限';
        $temp[0]['id'] = 'all';
        foreach ($features as $key => $feature) {
            $temp[$key+1]['name'] = $feature->name;
            $temp[$key+1]['id'] = $feature->id;
        }
        $data[] = $temp;

        return array_prepend($data, $renovation);
    }
}