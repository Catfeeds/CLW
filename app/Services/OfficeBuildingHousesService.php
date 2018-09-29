<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\BuildingFeature;
use App\Models\Collection;
use App\Models\OfficeBuildingHouse;
use App\Models\RelBlock;
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
        //楼层总数
        $office->total_floor = $office->buildingBlock->total_floor?$office->buildingBlock->total_floor . '层' : '';
        $office->elevator_num =  $office->buildingBlock->elevator_num;
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
        $user = Auth::guard('api')->user();
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
        $res->building_name = empty($res->buildingBlock->building)?'':$res->buildingBlock->building->name;
    }

    /**
     * 说明: 浏览记录,房源收藏获取房源相关信息
     *
     * @param $res
     * @return mixed
     * @author 刘坤涛
     */
    public function houseInfo($res)
    {
        if (!empty($res->officeBuildingHouse)) {
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
            $res->officeBuildingHouse = $this->getShow($res->officeBuildingHouse);
        }
        return $res;
    }

    // 房源一站通房源
    public function getMiniHouse($request)
    {
        $houses = OfficeBuildingHouse::make();

        // 处理条件
        $data = $request->all();
        if (!empty($data)) {
            // 有搜索条件的
            $data['region'] = json_decode($data['region'] ?? '{}', true) ?? [];
            $data['acreage'] = json_decode($data['acreage'] ?? '{}', true) ?? [];
            $data['price'] = json_decode($data['price'] ?? '{}', true) ?? [];
            $data['houseType'] = json_decode($data['houseType'] ?? '{}', true) ?? [];
            $data['payType'] = json_decode($data['payType'] ?? '{}', true) ?? [];

            // 楼盘筛选
            if (!empty($data['region']['building_name'])) {
                // 获取楼盘id
                $buildingIds = Building::where('name', $data['region']['building_name'])->pluck('id')->toArray();
            } elseif (!empty($data['region']['block'])) {
                // 商圈id
                $blockId = Block::where('name', $data['region']['block'])->pluck('id');
                // 楼盘id
                $buildingIds = Building::where('block_id', $blockId)->pluck('id');
            } elseif (!empty($data['region']['area'])) {
                // 区域id
                $areaId = Area::where('name', $data['region']['area'])->pluck('id');
                // 楼盘id
                $buildingIds = Building::where('area_id', $areaId)->pluck('id');
            } else {
                // 楼盘id
                $buildingIds = Building::all()->pluck('id')->toArray();
            }

            // 获取楼座id
            $buildingBlockIds = BuildingBlock::whereIn('building_id', $buildingIds)->pluck('id')->toArray();

            $houses = OfficeBuildingHouse::whereIn('building_block_id', $buildingBlockIds);

            if (!empty($data['acreage'])) {
                $houses = $houses->whereBetween('constru_acreage', $data['acreage']);
            }

            if (!empty($data['price'])) {
                $houses = $houses->whereBetween('unit_price', $data['price']);
            }

            // 付款方式筛选
            if (!empty($data['payType']['bond_month']) || !empty($data['payType']['pay_month'])) {
                $houses = $houses->where('payment_type', 3);
            }
        }

        $houses = $houses->with('buildingBlock.building')->paginate(10);
        $housesData = $this->buildingData($houses);

        $resHouses = $houses->toArray();
        $resHouses['data'] = $housesData;

        return $resHouses;
    }

    // 数据处理
    public function buildingData($houses)
    {
        $housesData = array();
        foreach ($houses as $key => $house) {
            $housesData[$key]['guid'] = $house->id;
            $housesData[$key]['id'] = $house->id;
            $housesData[$key]['mini_label'] = true;
            $housesData[$key]['title'] = $house->title;
            $housesData[$key]['tel'] = '123456';
            $housesData[$key]['building_name'] = $house->buildingBlock->building->name;
            $housesData[$key]['total_acreage'] = $house->constru_acreage;
            $housesData[$key]['unit_price'] = $house->unit_price;
            $housesData[$key]['pay_type'] = '押一付一';
            $housesData[$key]['address'] = $house->buildingBlock->building->address;
            $housesData[$key]['img_url'] = $house->img_url;
            $housesData[$key]['degree'] = 100;
            $housesData[$key]['house_type_hall'] = true;
            $housesData[$key]['house_type_room'] = true;
        }

        return collect($housesData);
    }

    // 房源一站通房源详情
    public function getMiniHouseInfo($request)
    {
        $house = OfficeBuildingHouse::where('id', $request->id)->with('buildingBlock.building')->first();

        $houseData = array();
        $houseData['address'] = $house->buildingBlock->building->address;
        $houseData['tel'] = '123456';
        $houseData['building_name'] = $house->buildingBlock->building->name;
        $houseData['parking_fee'] = $house->buildingBlock->building->parking_fee;
        $houseData['pay_type'] = '押一付一';
        $houseData['register_cn'] = $house->register_company_cn;
        $houseData['renovation_cn'] = $house->renovation_cn;
        $houseData['rent_free_cn'] = $house->rent_free_cn;
        $houseData['customizable_cn'] = '';
        $houseData['station'] = $house->station_number_cn;
        $houseData['house_type_room'] = $house->room;
        $houseData['house_type_hall'] = $house->hall;
        $houseData['property_fee'] = $house->buildingBlock->property_fee;
        $houseData['furniture_cn'] = empty($house->support_facilities)?'无':'有';
        $houseData['check_in_time'] = $house->check_in_time_cn;
        $houseData['short_lease_cn'] = $house->shortest_lease_cn;
        $houseData['status'] = true;
        $houseData['movies'] = $house->img_url;
        $houseData['imgtotal'] = count($house->indoor_img);
        $houseData['total_acreage'] = $house->constru_acreage;
        $houseData['unit_price'] = $house->unit_price;
        $houseData['floor_num'] = $house->floor;
        $houseData['usage_rate'] = '';
        $houseData['title'] = $house->title;

        return $houseData;
    }

}