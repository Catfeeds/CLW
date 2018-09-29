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
        return HotBlock::orderBy('sort', 'asc')->with('block')->get();
    }

    //pc端核心商圈
    public function getList()
    {
        $res = HotBlock::with('block')->take(5)->where('pc_img', '!=', null)->get();
        foreach ($res as $v) {
            $v->area_guid = $v->block->area_guid;
        }
        return $res;
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
            'pc_img' => $request->pc_img,
            'block_guid' => $request->block_guid,
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
        $hotBlock->pc_img = $request->pc_img;
        $hotBlock->block_guid = $request->block_guid;
        $hotBlock->sort = $request->sort;
        if (!$hotBlock->save()) return false;
        return true;
    }
}