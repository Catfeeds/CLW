<?php

namespace App\Services;



use App\Models\Service;

class ServicesService
{
    public function getServices()
    {
        $allServices = Service::orderBy('sort', 'asc')->get();

        $datas = array();
        foreach ($allServices as $k=>$v) {
            $data['url'] = 'www.clw.com/api/app'.$v->id;
            $data['name'] = $v->name;
            $data['icon'] = config('setting.qiniu_url').$v->icon;

            if ($k > 1) {
                if ($k > 9) {
                    $data['url'] = '';
                    $data['name'] = '全部';
                    $data['icon'] = ''; // 全部默认图片
                }

                $datas[1][] = $data;
            } else {
                $datas[0][] = $data;
            }
        }

        return $datas;
    }

}