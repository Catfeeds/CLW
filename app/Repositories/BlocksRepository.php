<?php

namespace App\Repositories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Model;

class BlocksRepository extends Model
{
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