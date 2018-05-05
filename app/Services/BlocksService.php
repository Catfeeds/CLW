<?php

namespace App\Services;

use App\Models\Block;

class BlocksService
{
    /**
     * 说明: 获取所有商圈信息
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     * @author 罗振
     */
    public function getAllBlocks()
    {
        return Block::all();
    }


}