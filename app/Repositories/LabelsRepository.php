<?php

namespace App\Repositories;

use App\Models\Label;
use Illuminate\Database\Eloquent\Model;

class LabelsRepository extends Model
{
    //标签列表
    public function labelList($request)
    {
        return Label::with('category')->paginate($request->per_page??10);
    }

    //添加标签
    public function addLabel($request)
    {
        return Label::create([
           'category_id' => $request->category_id,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'stage' => $request->stage
        ]);
    }

    //修改标签
    public function updateLabel($label, $request)
    {
        $label->category_id = $request->category_id;
        $label->parent_id = $request->parent_id;
        $label->name = $request->name;
        $label->stage = $request->stage;
        if (!$label->save()) return false;
        return true;
    }

}