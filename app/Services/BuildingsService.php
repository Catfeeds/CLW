<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;

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
        $res->address_cn = $res->area->name . '-';
        $res->address_type = $res->area->name . '/';
        $res->pc_address_cn = $res->area->name;
        if (!empty($res->block)) $res->address_cn .= $res->block->name;
        //商圈名称 / 链接
        if (!empty($res->block)) $res->address_type .= $res->block->name;
        if (!empty($res->block)) $res->pc_address_cn  = $res->pc_address_cn . ' - ' . $res->block->name;
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
     * @param $res
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
        if (!empty($res->building->block)) {
            $res->address_cn = $res->building->area->name . '-' . $res->building->block->name;
        } else {
            $res->address_cn = $res->building->area->name;
        }
    }

    /**
     * 说明: 价格及面积区间
     *
     * @param $res
     * @author 罗振
     */
    public function priceAndAcreageSection($res)
    {
        //楼盘单价区间
        $res->unit_price = intval($res->house->min('unit_price')) . '-' . intval($res->house->max('unit_price'));
        //楼盘总价区间
        $low_price = $res->house->min('total_price') / 10000;
        $high_price = $res->house->max('total_price') / 10000;
        $res->total_price= (is_int($low_price) ? $low_price : round($low_price, 1)) . '-' . (is_int($high_price) ? $high_price : round($high_price, 1));
        //楼盘面积区间
        $res->constru_acreage = intval($res->house->min('constru_acreage')) . ' - ' . intval($res->house->max('constru_acreage'));
    }

    // 获取楼盘下房子均价
    public function getBuildingAveragePrice($houses)
    {
        return round($houses->sum('total_price') / $houses->sum('constru_acreage'),2).'元/㎡.月';
    }

    // 获取商圈下房子均价
    public function getBlockAveragePrice($blockId)
    {

        $block = Block::where('id', $blockId)->with('building.buildingBlock.house')->first();
        return $this->getAveragePrice($block);
    }

    // 获取区域下房子均价
    public function getAreaAveragePrice($areaId)
    {
        $area = Area::where('id', $areaId)->with('building.buildingBlock.house')->first();
        return $this->getAveragePrice($area);
    }

    // 获取商圈和区域下房子均价公共方法
    public function getAveragePrice(
        $res
    )
    {
        // 获取商圈和区域下面所有房源
        $datas = array();
        foreach ($res->building as $v) {
            foreach ($v->buildingBlock as $val) {
                $datas[] = $val->house->toArray();
            }
        }
        // 计算商圈和区域下面所有房源的均价
        return round(collect($datas)->collapse()->sum('total_price') / collect($datas)->collapse()->sum('constru_acreage'),2).'元/㎡.月';
    }

    // 关键词搜索高亮处理
    public function highlight(
        $data,
        $keyword
    )
    {
        foreach ($data as $v) {
            if (strpos($v->name, $keyword) !==false) {
                $v->name = str_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $v->name);
            }

            if (strpos($v->address, $keyword) !==false) {
                $v->address = str_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $v->address);
            }

            if (strpos($v->pc_address_cn, $keyword) !==false) {
                $v->pc_address_cn = str_replace($keyword, '<span class="highlight">'.$keyword.'</span>', $v->pc_address_cn);
            }
        }

        return $data;
    }
}