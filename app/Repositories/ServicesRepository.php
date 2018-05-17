<?php

namespace App\Repositories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Model;

class ServicesRepository extends Model
{
    /**
     * 说明:服务列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function serviceList()
    {
        return Service::orderBy('weight')->get();
    }
    
    /**
     * 说明:添加服务
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addService($request)
    {
        return Service::create([
            'name' => $request->name,
            'weight' => $request->weight,
            'shelf' => $request->shelf,
            'show' => $request->show,
            'home_icon' => $request->home_icon,
            'list_icon' => $request->list_icon,
            'detail' => $request->detail,
            'label_id' => $request->label_id,
        ]);
    }

    /**
     * 说明:更新服务
     *
     * @param $request
     * @param $service
     * @return bool
     * @author 刘坤涛
     */
    public function updateService($request, $service)
    {
        $service->name = $request->name;
        $service->weight = $request->weight;
        $service->shelf = $request->shelf;
        $service->show = $request->show;
        $service->home_icon = $request->home_icon;
        $service->list_icon = $request->list_icon;
        $service->detail = $request->detail;
        $service->label_id = $request->label_id;

        if (!$service->save()) return false;
        return true;
    }
}