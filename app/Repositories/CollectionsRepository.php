<?php

namespace App\Repositories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CollectionsRepository extends Model
{
    /**
     * 说明: 获取当前登录用户
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function user()
    {
        if (!empty(Auth::guard('api')->user())) {
            return Auth::guard('api')->user();
        } else {
            return Session::get('user');
        }
    }

    /**
     * 说明: 获取该用户的收藏列表
     *
     * @param $request
     * @param $service
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     * @author 刘坤涛
     */
    public function collectionList($request, $service)
    {
        $collection=  Collection::with('officeBuildingHouse', 'officeBuildingHouse.houseLabel')->where('user_id', $this->user()->id)->paginate($request->per_page??10);
        foreach($collection as $v) {
            $service->HouseInfo($v);
        }

        return $collection;
    }

    /**
     * 说明: 添加收藏
     *
     * @param $request
     * @return mixed
     * @author 刘坤涛
     */
    public function addCollection($request)
    {
        return Collection::create([
            'user_id' => $this->user()->id,
            'house_id' => $request->house_id
        ]);
    }
}