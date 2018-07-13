<?php

namespace App\Models;

class Category extends BaseModel
{
    // 标签
    public function label()
    {
        return $this->hasMany('App\Models\Label','category_id','id');
    }

    public function delete()
    {
        \DB::beginTransaction();
        try {
            parent::delete();

            // 删除标签
//            Label::where('category_id', $this->id)->with('label.goodsHasLabel')->delete();

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::debug('删除大类失败：', $this->all());
            return false;
        }
        return true;
    }

}
