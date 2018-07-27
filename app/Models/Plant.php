<?php

namespace App\Models;

class Plant extends BaseModel
{
    protected $appends = [
        'img_url'
    ];

    public function goodsHasLabels()
    {
        return $this->hasMany('App\Models\GoodsHasLabel','goods_id','id')->where('goods_type', 'App\Models\Plant');
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

    // 删除标签及商品标签关联数据
    public function delete()
    {
        \DB::beginTransaction();
        try {
            parent::delete();
            // 删除商品标签关联表数据
            $goodsHasLabel = GoodsHasLabel::where([
                'goods_type' => 'App\Models\Plant',
                'goods_id' => $this->id,
            ])->delete();
            if (empty($goodsHasLabel)) throw new \Exception('商品标签关联表删除失败！');

            // 删除绿植租摆商品
            self::where('id', $this->id)->delete();

            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollback();
            return false;
        }
    }
}
