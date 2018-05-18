<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\Collection;
use App\Models\HouseFeature;
use Illuminate\Support\Facades\Auth;

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
        $areas = Area::with('block')->get();

        foreach ($areas as $k => $area) {
            $res[$k+1]['name'] = $area->name;
            $res[$k+1]['area_id'] = $area->id;
            // 获取楼盘数据
            $block_list = array();
            $blockDatas = $area->block;
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

    /**
     * 说明: 房源详情
     *
     * @param $office
     * @return mixed
     * @author 刘坤涛
     */
    public function getShow($office)
    {
        //楼层总数
        $office->total_floor = $office->BuildingBlock->total_floor . '层';
        //支付方式
        $office->property_company = $office->BuildingBlock->property_company;
        //客梯数量
        $office->passenger_lift = $office->BuildingBlock->passenger_lift;
        //货梯数量
        $office->cargo_lift = $office->BuildingBlock->cargo_lift;
        //总电梯数量
        $office->president_lift = $office->BuildingBlock->president_lift;
        //gps
        $office->gps = $office->BuildingBlock->Building->gps;
        //空调类型
        switch ($office->BuildingBlock->air_conditioner) {
            case 1:
                $office->air_conditioner = '中央空调';
                break;
            case 2:
                $office->air_conditioner = '非中央空调';
                break;
                default;
                break;
        }
        //采暖方式
        switch ($office->BuildingBlock->heating) {
            case 1:
                $office->heating = '空调';
                break;
            case 2:
                $office->heating = '太阳能';
                break;
                default;
                break;
        }
        //物业费
        $office->property_fee = $office->BuildingBlock->property_fee . '元/㎡·月';
        //房屋结构
        switch ($office->BuildingBlock->structure) {
            case 1:
                $office->structure = '钢筋混凝土结构';
                break;
            case 2:
                $office->structure = '钢结构';
                break;
            case 3:
                $office->structure = '砖混结构';
                break;
            case 4:
                $office->structure = '砖木结构';
                break;
                default;
                break;
        }

        //等级
        switch ($office->BuildingBlock->calss) {
            case 1:
                $office->calss = '甲';
                break;
            case 2:
                $office->calss = '乙';
                break;
            case 3:
                $office->calss = '丙';
                break;
                default;
                break;
        }
        $office->collection = false;
        //获取当前登录用户
        $user = Auth::guard('api')->user();
        // 判断该房源是否被当前登录用户收藏
        if ($user) {
            $collection = Collection::where(['user_id' => $user->id, 'house_id' => $office->id])->first();
            if ($collection) $office->collection = true;
        }
        return $office;
    }

}