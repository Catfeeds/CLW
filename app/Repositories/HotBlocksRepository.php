<?php

namespace App\Repositories;

use App\Models\HotBlock;
use Illuminate\Database\Eloquent\Model;

class HotBlocksRepository extends Model
{
    /**
     * 说明: 热门商圈列表
     *
     * @return mixed
     * @author 罗振
     */
    public function hotBlocksList()
    {
        return HotBlock::orderBy('sort', 'asc')->get();
    }

    /**
     * 说明: 添加热门商圈
     *
     * @param $request
     * @return mixed
     * @author 罗振
     */
    public function addHotBlocks($request)
    {
        return HotBlock::create([
            'img' => $request->img,
            'block_id' => $request->block_id,
            'sort' => $request->sort
        ]);
    }

    /**
     * 说明: 修改热门商圈
     *
     * @param $request
     * @param HotBlock $hotBlock
     * @return bool
     * @author 罗振
     */
    public function updateHotBlocks(
        $request,
        HotBlock $hotBlock
    )
    {
        $hotBlock->img = $request->img;
        $hotBlock->block_id = $request->block_id;
        $hotBlock->sort = $request->sort;
        if (!$hotBlock->save()) return false;
        return true;
    }
}