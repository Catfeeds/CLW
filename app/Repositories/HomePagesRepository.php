<?php

namespace App\Repositories;

use App\Models\Custom;
use App\Models\HouseImgRecord;
use App\Models\OfficeBuildingHouse;
use App\Models\OwnerViewRecord;
use App\Models\Track;
use Illuminate\Database\Eloquent\Model;

class HomePagesRepository extends Model
{
    /**
     * 说明: 后台首页数据
     *
     * @param $date
     * @param $user
     * @return array
     * @author 刘坤涛
     */
    public function getData($date, $id)
    {
        $data = [];
        //获取该用户的新增房源数量
        $data['house_num'] = OfficeBuildingHouse::where('guardian', $id)->whereBetween('created_at', $date)->count();
        //获取该用户新增客源
        $data['customer_num'] = Custom::where('guardian', $id)->whereBetween('created_at', $date)->count();
        //获取房源更进次数
        $data['house_tracks_num'] = Track::where(['user_id'=> $id, 'house_model' => 'App\Models\OfficeBuildingHouse'])->whereBetween('created_at', $date)->count();
        //客源跟进次数
        $data['customer_tracks_num'] = Track::where(['house_model' => null, 'user_id' => $id])->whereBetween('created_at', $date)->count();
        //房源带看
        $data['lead_house'] = Track::where(['house_model' => 'App\Models\OfficeBuildingHouse', 'tracks_mode' => 7, 'user_id' => $id])->whereBetween('created_at', $date)->count();
        //客源带看
        $data['lead_customer'] = Track::where(['house_model' => null, 'tracks_mode' => 7, 'user_id' => $id])->whereBetween('created_at', $date)->count();
        //上传图片
        $data['upload_img'] = HouseImgRecord::where(['user_id' => $id, 'status' => 2])->whereBetween('created_at', $date)->count();
        //查看信息次数
        $data['view_record_num'] = OwnerViewRecord::where('user_id', $id)->whereBetween('created_at', $date)->count();
        return $data;
    }

    public function waitTrackHouse($id, $service)
    {
        //查询该用户的待跟进房源并且逾期时间在2天以内的房源ID
        $houseId = OwnerViewRecord::where(['user_id' => $id, 'status' => 1, 'house_model' => 'App\Models\OfficeBuildingHouse'])->pluck('house_id')->toArray();
        //查询出对应的房子
        $house = OfficeBuildingHouse::whereIn('id',$houseId)->with('buildingBlock','buildingBlock.building')->where('end_track_time','<', (time() + 48*3600))->get();
        $info = $service->getInfo($house);
        return $info;
    }
}