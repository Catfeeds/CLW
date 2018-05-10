<?php

namespace App\Repositories;

use App\Models\Building;
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
        return Recommend::all();
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
            'building_id' => $request->building_id,
            'building_info' => $request->building_info
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
        $recommend->building_id = $request->building_id;
        $recommend->building_info = $request->building_info;
        if (!$recommend->save()) return false;
        return true;
    }

    /**
     * 说明: 首页点击精品推荐跳转到楼盘类表
     *
     * @param $recommend
     * @return mixed
     * @author 刘坤涛
     */
    public function getBuildingList($recommend)
    {
        return Building::whereIn('id', $recommend->building_id)->get();
    }


}