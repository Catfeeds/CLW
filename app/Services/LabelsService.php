<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Block;
use App\Models\Category;

class LabelsService
{
    // 通过大类获取一级标签
    public function getParentByCategory($categoryId)
    {
        // 大类
        $category = Category::find($categoryId);

        // 返回一级标签
        return $category->label->where('stage', 1);
    }
    
    
}