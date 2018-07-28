<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    protected $guarded = [];

    protected $appends = [
        'img_url',
        'img_cn'
    ];

    // 大类
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

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
            // 获取标签id
            if ($this->stage == 1) {
                $labelId = self::where('parent_id', $this->id)->pluck('id')->toArray();
            } else {
                $labelId[] = $this->id;
            }

            // 删除标签
            self::whereIn('id',$labelId)->delete();

            // 删除商品标签关联数据
            GoodsHasLabel::whereIn('label_id', $labelId)->delete();

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

    // 标签图片处理
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
