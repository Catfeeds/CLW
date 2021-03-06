<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\BuildingFeature;
use App\Models\Collection;
use App\Models\RelBlock;
use Illuminate\Support\Facades\Session;

class HousesService
{
    // 找房列表区域搜索条件
    public function blockCondition()
    {
        // 获取所有推荐商圈
        $relBlock = RelBlock::where('recommend', '!=',null)->pluck('block_guid')->toArray();
        $recommendBlocks = Block::whereIn('guid',$relBlock)->withCount('building')->get();

        // 推荐商圈数据
        $recommendBlocksData = array();
        $recommendBlocksData['name'] = '推荐';
        $recommendBlocksData['area_guid'] = 'all';
        $blocks = array();
        $blocks[0]['name'] = '全部区域';
        $blocks[0]['block_guid'] = 'all';
        $blocks[0]['building_count'] = '';
        foreach ($recommendBlocks as $k => $v) {
            $blocks[$k+1]['name'] = $v->name;
            $blocks[$k+1]['block_guid'] = $v->guid;
            $blocks[$k+1]['building_count'] = $v->building_count;
        }

        $recommendBlocksData['block_list'] = $blocks;

        // 通过区域获取商圈
        $areas = Area::with('block')->get();

        foreach ($areas as $k => $area) {
            $res[$k+1]['name'] = $area->name;
            $res[$k+1]['area_guid'] = $area->guid;
            // 获取楼盘数据
            $block_list = array();
            $blockDatas = $area->block;
            foreach ($blockDatas as $key => $val) {
                // 拼接数据
                $block_list[0]['name'] = '';
                $block_list[0]['block_guid'] = 'all';
                $block_list[0]['building_count'] = '';

                $block_list[$key+1]['name'] = $val->name;
                $block_list[$key+1]['block_guid'] = $val->guid;
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
                'name' => '简装修',
                'id' => 4,
            ],
            [
                'name' => '毛坯',
                'id' => 5,
            ]
        ];

        // 特色
        $features = BuildingFeature::orderBy('weight', 'desc')->get();
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
        //楼盘名称
        $office->building_name = $office->buildingBlock->building->name;
        //楼盘ID
        $office->building_id = $office->buildingBlock->building->id;
        //楼层总数
        $office->total_floor = $office->buildingBlock->total_floor?$office->buildingBlock->total_floor . '层' : '';
        //支付方式
        $office->property_company = $office->buildingBlock->property_company;
        //客梯数量
        $office->passenger_lift = $office->buildingBlock->passenger_lift?$office->buildingBlock->passenger_lift . '部': '';
        //货梯数量
        $office->cargo_lift = $office->buildingBlock->cargo_lift?$office->buildingBlock->cargo_lift. '部' : '';
        //总裁电梯数量
        $office->president_lift = $office->buildingBlock->president_lift?$office->buildingBlock->president_lift . '部' : '';
        //总电梯数
        $elevator_num = $office->buildingBlock->passenger_lift + $office->buildingBlock->cargo_lift + $office->buildingBlock->president_lift;
        $office->elevator_num =  $elevator_num ? $elevator_num . '部' : '';
        //gps
        $office->gps = $office->buildingBlock->building->gps;
        //空调类型
        switch ($office->buildingBlock->air_conditioner) {
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
        switch ($office->buildingBlock->heating) {
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
        $office->property_fee = $office->buildingBlock->property_fee?$office->buildingBlock->property_fee . '元/㎡·月' : '';
        //物业公司
        $office->property_company = $office->buildingBlock->property_company;
        //房屋结构
        switch ($office->buildingBlock->structure) {
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
        switch ($office->buildingBlock->class) {
            case 1:
                $office->class = '甲';
                break;
            case 2:
                $office->class = '乙';
                break;
            case 3:
                $office->class = '丙';
                break;
            default;
                break;
        }
        $office->collection = false;
        //获取当前登录用户
        $user = Session::get('user');
        // 判断该房源是否被当前登录用户收藏
        if ($user) {
            $collection = Collection::where(['user_id' => $user->id, 'house_id' => $office->id])->first();
            if ($collection) $office->collection = true;
        }
        //房源地址
        $office->address = $office->buildingBlock->building->address;
        return $office;
    }

    /**
     * 说明: 房源列表添加标签标识
     *
     * @param $res
     * @return mixed
     * @author 刘坤涛
     */
    public function labelShow($res)
    {
        $res->label_cn = false;
        if ($res->houseLabel) {
            $res->label_cn = true;
        }
        return $res;
    }

    /**
     * 说明: 房源获取楼盘名称
     *
     * @param $res
     * @author 刘坤涛
     */
    public function getBuildingName($res)
    {
        $res->building_name = $res->buildingBlock->building->name;
    }

    /**
     * 说明: 浏览记录,房源收藏获取房源相关信息
     *
     * @param $res
     * @return mixed
     * @author 刘坤涛
     */
    public function HouseInfo($res)
    {
        //房源标题
        $res->house_title = $res->officeBuildingHouse->title;
        //房源面积
        $res->acreage = $res->officeBuildingHouse->getConstruAcreageCnAttribute();
        //单价
        $res->unit_proce = $res->officeBuildingHouse->getUnitPriceCnAttribute();
        //总价
        $res->total_price = $res->officeBuildingHouse->getTotalPriceCnAttribute();
        //图片
        $res->img = $res->officeBuildingHouse->getIndoorImgCnAttribute();
        //标签
        $res->label = false;
        if ($res->officeBuildingHouse->houseLabel) $res->label = true;
        //房源标签
        $res->feature = $res->officeBuildingHouse->getHouseFeatureAttribute();
        return $res;
    }


    /**
     * 说明: 房源编号
     *
     * @param $initials
     * @param $houseId
     * @return string
     * @author 罗振
     */
    public function setHouseIdentifier($initials, $houseId)
    {
        if (strlen($houseId) == 1) {
            return $initials.date('Ymd', time()).'00'.$houseId;
        } elseif (strlen($houseId) == 2) {
            return $initials.date('Ymd', time()).'0'.$houseId;
        } else {
            return $initials.date('Ymd', time()).$houseId;
        }
    }

}