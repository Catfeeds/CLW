<?php

namespace App\Repositories;

use App\Models\Block;
use Illuminate\Database\Eloquent\Model;

class BlocksRepository extends Model
{
    public function blockList()
    {
        return Block::where([])->paginate(10);
    }

    public function addBlock(
        $request
    )
    {
        return Block::create([
            'name' => $request->name,
            'area_id' => $request->area_id,
            'recommend' => $request->recommend,
            'agent_name' => $request->agent_name,
            'agent_pic' => $request->agent_pic,
        ]);
    }

    public function updateBlock(
        $request,
        Block $block
    )
    {
        $block->name = $request->name;
        $block->area_id = $request->area_id;
        $block->recommend = $request->recommend;
        $block->agent_name = $request->agent_name;
        $block->agent_pic = $request->agent_pic;

        if (!$block->save()) return false;
        return true;
    }

    // 商圈添加推荐
    public function addRecommend(
        $id,
        $request
    )
    {
        return Block::where('id', $id)->update(['recommend' => $request->recommend]);
    }
}