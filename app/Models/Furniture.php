<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    protected $guarded = [];

    protected $appends = [
        'img_url',
        'img_cn'
    ];

    public function goodsHasLabels()
    {
        return $this->hasMany('App\Models\GoodsHasLabel','goods_id','id')->where('goods_type', 'App\Models\Furniture');
    }

    // 删除标签及商品标签关联数据
    public function delete()
    {
        \DB::beginTransaction();
        try {
            parent::delete();
            // 删除商品标签关联表数据
            GoodsHasLabel::where([
                'goods_type' => 'App\Models\Furniture',
                'goods_id' => $this->id,
            ])->delete();

            // 删除办公家具商品
            self::where('id', $this->id)->delete();

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }

    // 前端图片展示
    public function getImgCnAttribute()
    {
        return !empty($this->img)?config('setting.qiniu_url').$this->img:'';
    }

    public function getImgUrlAttribute()
    {
        return collect($this->img)->map(function ($img) {
            return [
                'name' => $img,
                'url' => config('setting.qiniu_url') . $img
            ];
        })->values();
    }
}
