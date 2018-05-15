<?php

namespace App\Repositories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Model;

class BlocksRepository extends Model
{
    /**
     * 说明: 商圈添加推荐
     *
     * @param Block $block
     * @param $request
     * @return bool
     * @author 罗振
     */
    public function updateRecommend(
        Block $block,
        $request
    )
    {
        $block->recommend = $request->recommend;
        if (!$block->save()) return false;
        return true;
    }
}