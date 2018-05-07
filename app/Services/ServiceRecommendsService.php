<?php

namespace App\Services;


use App\Models\Service;

class ServiceRecommendsService
{
    /**
     * 说明:获取服务下拉数据
     *
     * @return \Illuminate\Support\Collection|static
     * @author 刘坤涛
     */
    public function serviceSelect()
    {
        $data = Service::all();
        return $data->map(function($v) {
            return [
                'label' => $v->id,
                'value' => $v->name
            ];
        });
    }
}