<?php

namespace App\Repositories;

use App\Models\ServiceRecommend;
use Illuminate\Database\Eloquent\Model;

class ServiceRecommendsRepository extends Model
{
    /**
     * 说明:推荐服务列表平
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function serviceRecommendsList()
    {
        return ServiceRecommend::orderBy('weight')->get();
    }

    /**
     * 说明:添加推荐服务
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addServiceRecommend($request)
    {
        return ServiceRecommend::create([
            'service_id' => $request->service_id,
            'pic' => $request->pic,
            'weight' => $request->weight
        ]);
    }

    /**
     * 说明:修改推荐服务
     *
     * @param $request
     * @param $serviceRecommend
     * @return bool
     * @author 刘坤涛
     */
    public function updateServiceRecommend($request, $serviceRecommend)
    {
        $serviceRecommend->service_id = $request->service_id;
        $serviceRecommend->pic = $request->pic;
        $serviceRecommend->weight = $request->weight;
        if (!$serviceRecommend->save()) return false;
        return true;
    }

}