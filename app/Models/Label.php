<?php

namespace App\Models;

class Label extends BaseModel
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['nextLabel'];

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

    public function nextLabel()
    {
        if ($this->stage == 1) {
            return $this->hasMany('App\Models\Label', 'parent_id', 'id')->where('stage', 2);
        } elseif ($this->stage == 2) {
            return self::find($this->id);
        }
    }
    
}
