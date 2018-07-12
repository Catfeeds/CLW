<?php

namespace App\Models;

class Category extends BaseModel
{
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;

    protected $softCascade = ['label'];

    // 标签
    public function label()
    {
        return $this->hasMany('App\Models\Label','category_id','id');
    }
}
