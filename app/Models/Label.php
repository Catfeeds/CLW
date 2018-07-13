<?php

namespace App\Models;

class Label extends BaseModel
{
    public function goodsHasLabel()
    {
        return $this->hasMany('App\Models\GoodsHasLabel','label_id','id');
    }

    // 通过大类名称获取标签
    public static function getLabelByCategoryName(
        $name
    )
    {
        $category = Category::where('name', $name)->first();
        if (empty($category)) return collect();
        return self::where('category_id', $category->id)->with('next_label')->get();
    }

    // 获取当前标签的下级标签
    public function next_label()
    {
        return $this->hasMany('App\Models\Label', 'parent_id', 'id')->where('stage', 2);
    }

    // 删除标签及商品标签关联数据
    public function delete()
    {
        \DB::beginTransaction();
        try {
            parent::delete();
            // 获取二级标签id
            if ($this->stage == 1) {
                $labelId = self::where('parent_id', $this->id)->pluck('id')->toArray();
            } else {
                $labelId[] = $this->id;
            }

            // 删除二级标签
            self::whereIn('id',$labelId)->delete();

            // 删除商品标签关联数据
            GoodsHasLabel::whereIn('label_id', $labelId)->delete();
            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            Log::debug('删除小类失败：', $this->all());
            return false;
        }
        return true;
    }


}
