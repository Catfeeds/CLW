<?php

namespace App\Services;

use App\Models\Service;
use App\Models\ServiceLabel;

class ServicesService
{
    /**
     * 说明: 企业服务
     *
     * @return array
     * @author 罗振
     */
    public function getServices()
    {
        $allServices = Service::orderBy('weight', 'asc')->where([
            'show' => 1,
            'shelf' => 1
        ])->get();

        $datas = array();
        foreach ($allServices as $k => $v) {
            $data['id'] = $v->id;
            $data['name'] = $v->name;
            $data['icon'] = config('setting.qiniu_url').$v->home_icon;
            $data['detail_url'] = $v->detail_url;

            if ($k > 4) {
                if ($k > 9) {
                    $data['id'] = 'all';
                    $data['name'] = '全部';
                    $data['icon'] = 'https://upload.chulouwang.com/FuxNM53yDErXa0nTo8cZbGbk2y8K'; // 全部默认图片
                    $datas[1][4] = $data;
                } else {
                    $datas[1][] = $data;
                }
            } else {
                $datas[0][] = $data;
            }
        }

        return $datas;
    }

    /**
     * 说明: 获取服务列表
     *
     * @return ServiceLabel[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     * @author 罗振
     */
    public function allService()
    {
        return ServiceLabel::with('service')->get();
    }
    
}