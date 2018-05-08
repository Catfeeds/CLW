<?php

namespace App\Services;

use App\Models\Service;

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
        $allServices = Service::orderBy('weight', 'asc')->get();

        $datas = array();
        foreach ($allServices as $k => $v) {
            $data['id'] = $v->id;
            $data['name'] = $v->name;
            $data['icon'] = config('setting.qiniu_url').$v->icon;
//            $data['icon'] = $v->icon;

            if ($k > 4) {
                if ($k > 9) {
                    $data['id'] = 'all';
                    $data['name'] = '全部';
                    $data['icon'] = '../images/index_server_all.png'; // 全部默认图片
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

}