<?php

namespace App\Services;


use App\Models\Building;

class RecommendsService
{
    /**
     * 说明:获取楼盘下拉数据
     *
     * @return \Illuminate\Support\Collection|static
     * @author 刘坤涛
     */
    public function buildingsSelect()
    {
        $data = Building::all();
        return $data->map(function($v) {
            return [
                'label' => $v->id,
                'value' => $v->name
            ];
        });
    }
}