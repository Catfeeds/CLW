<?php

namespace App\Repositories;

use App\Models\Recommend;
use Illuminate\Database\Eloquent\Model;

class RecommendsRepository extends Model
{
    /**
     * 说明: 楼盘精品推荐列表
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 刘坤涛
     */
    public function recommendsList()
    {
        $recommends = Recommend::all();
        foreach ($recommends as $recommend) {
            $recommend->name = $recommend->building->name;
        }
        return $recommends;
    }

    //pc端精选专题
    public function getList()
    {
        return Recommend::take(5)->where('pc_pic','!=',null)->get();
    }

    /**
     * 说明: 楼盘精品推荐添加操作
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addRecommends($request)
    {
        return Recommend::create([
            'title' => $request->title,
            'introduce' => $request->introduce,
            'pic' => $request->pic,
            'building_guid' => $request->building_guid,
            'building_info' => $request->building_info,
        ]);
    }

    /**
     * 说明: 楼盘精品推荐修改操作
     *
     * @param $recommend
     * @param $request
     * @return bool
     * @author 刘坤涛
     */
    public function updateRecommend($recommend, $request)
    {
        $recommend->title = $request->title;
        $recommend->introduce = $request->introduce;
        $recommend->pic = $request->pic;
        $recommend->building_guid = $request->building_guid;
        $recommend->building_info = $request->building_info;
        if (!$recommend->save()) return false;
        return true;
    }
}