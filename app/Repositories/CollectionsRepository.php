<?php

namespace App\Repositories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return Auth::guard('api')->user();
    }

    /**
     * 说明: 获取该用户的收藏列表
     *
     * @return mixed
     * @author 刘坤涛
     */
    public function collectionList()
    {
        return Collection::where('user_id', $this->user()->id)->get();
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