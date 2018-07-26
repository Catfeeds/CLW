<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\Category;
use App\Models\GoodsHasLabel;

class LabelsService
{
    // 通过大类获取一级标签
    public function getParentByCategory($categoryId)
    {
        // 大类
        $category = Category::find($categoryId);

        // 返回一级标签
        return $category->label->where('stage', 1);
    }

    // 标签数据处理
    public function labelData($category, $labels)
    {
        $oneLable = array();
        foreach ($labels as $key => $val) {
            if ($val->stage == 1) {
                $oneLable[$key]['name'] = $val->name;
                $oneLable[$key]['id'] = $val->id;
                    $twoLable = array();
                    foreach ($val->next_label as $k => $v) {
                        $twoLable[$k]['name'] = $v->name;
                        $twoLable[$k]['id'] = $v->id;
                    }
                    $oneLable[$key]['children'] = $twoLable;
            }
        }

        $data = array();
        $data['name'] = $category;
        $data['children'] = $oneLable;

        return $data;
    }

    // 获取所有商品
    public function getAllGoods(
        $request,
        $model

    )
    {
        if (empty($request->labels)) {
            $goods = $model::paginate(10);
        } else {
            // 获取标签数据
            $goodsIds = GoodsHasLabel::where('goods_type', $model)->whereIn('label_id', $request->labels)->pluck('goods_id')->toArray();

            $goods = $model::whereIn('id', $goodsIds)->paginate(10);
        }

        return $goods;
    }

}