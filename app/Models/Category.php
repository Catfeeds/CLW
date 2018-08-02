<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    // 标签
    public function label()
    {
        return $this->hasMany('App\Models\Label','category_id','id');
    }

    // 删除大类下所有标签及商品标签关联数据
    public function delete()
    {
        \DB::beginTransaction();
        try {
            parent::delete();
            // 获取标签商品关联id
            $goodsHasLabelId = Label::where('category_id', $this->id)->first()->goodsHasLabel->pluck('id')->toArray();

            // 删除标签商品关联
            GoodsHasLabel::whereIn('id',$goodsHasLabelId)->delete();

            // 删除关联标签
            Label::where('category_id', $this->id)->delete();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::debug('删除大类失败：', $this->all());
            return false;
        }
        return true;
    }

}
