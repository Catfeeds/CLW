<?php

namespace App\Services;

use App\Models\Category;
use App\Models\GoodsHasLabel;
use App\Models\Label;

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
    public function labelData(
        $category,
        $labels,
        $request
    )
    {
        $oneLable = array();
        foreach ($labels as $key => $val) {
            if ($val->stage == 1) {
                $oneLable[$key]['name'] = $val->name;
                $oneLable[$key]['id'] = $val->id;
                $oneLable[$key]['show'] = $val->show;
                $twoLable = array();
                $twoLable[0]['name'] = '全部';
                $twoLable[0]['url'] = $this->getUrl('', $request->labels, $request->url(), $val->next_label->pluck('id')->toArray(),true);
                // 判断全部是否选择
                if (!empty($request->labels) && array_intersect($val->next_label->pluck('id')->toArray(), $request->labels)) {
                    $twoLable[0]['status'] = false;
                } else {
                    $twoLable[0]['status'] = true;
                }
                
                foreach ($val->next_label as $k => $v) {
                    if (!empty($v->img)) {
                        $twoLable[$k+1]['img'] = $v->img_cn;
                    } else {
                        $twoLable[$k+1]['img'] = '';
                    }
                    $twoLable[$k+1]['name'] = $v->name;
                    $twoLable[$k+1]['id'] = $v->id;
                    $twoLable[$k+1]['url'] = $this->getUrl($v->id, $request->labels, $request->url(),$val->next_label->pluck('id')->toArray(), false);
                    // 判断标签是否选择
                    if (in_array($v->id, $request->labels??[])) {
                        $twoLable[$k+1]['status'] = true;
                    } else {
                        $twoLable[$k+1]['status'] = false;
                    }
                }

                $oneLable[$key]['children'] = $twoLable;
            }
        }

        $data = array();
        $data['name'] = $category;
        $data['children'] = $oneLable;
        dd($data);
        return $data;
    }

    // 获取url
    public function getUrl(
        $id,    // 当前标签id
        $lables,    // 条件中选择到的标签id
        $url,   // 当前url
        $nextLabel, // 同行所有标签
        $type   // 是否代表全部标识
    )
    {
        $data = array();
        if (!empty($lables)) {
            // 判断当前行是否被选择且不是全部,将当前标签id拼接到要返回的条件数组
            $temp = array_intersect($nextLabel, $lables);
            if (empty($temp) && !$type) {
                $data[] = $id;
            }

            foreach ($lables as $key => $lable) {
                // 如果为全部,并且选中标签id存在于选中条件的同一行,不拼接要返回的条件数组
                if ($type && in_array($lable, $temp)) {
                   continue;
                }

                if ($id !== (int)$lable) {
                    // 如果 $lable 是当前行的其他值 $data[] 就等于 其本身
                    // 判断$id 和 $lable 是否同一行
                    if(in_array($id, $nextLabel) && in_array((int)$lable, $nextLabel)) {
                        $data[] = $id;
                    } else {
                        $data[] = (int)$lable;
                    }
                }
            }
        } else {
            if (empty($type)) {
                $data[] = $id;
            }
        }

        if (empty($data)) {
            return $url;
        } else {
            return $url.'?labels='.implode('-', $data);
        }
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
            $ids = [];
            $counts = array_count_values($goodsIds);
            foreach ($counts as $id => $n) {
                if ($n == count($request->labels)) $ids[] = $id;
            }

            $goods = $model::whereIn('id', $ids)->paginate(10);
        }

        return $goods;
    }

    // 添加商品时获取标签
    public function getLabels($categoryName)
    {
        $labels = Label::getLabelByCategoryName($categoryName);

        $oneLabel = array();
        foreach ($labels as $key => $value) {
            if ($value->stage == 1) {
                $oneLabel[$key]['label'] = $value->name;
                $twoLabel = array();
                if (!empty($value->next_label->count())) {
                    foreach ($value->next_label as $k => $v) {
                        $twoLabel[$k]['id'] = $v->id;
                        $twoLabel[$k]['label'] = $v->name;
                    }
                }
                $oneLabel[$key]['children'] = $twoLabel;
            }
        }

        return collect($oneLabel)->values();
    }
    
}