<?php

namespace App\Repositories;

use App\Models\Block;
use App\Models\RelBlock;
use Illuminate\Database\Eloquent\Model;

class BlocksRepository extends Model
{
    // 商圈列表
    public function blockList($request)
    {
        $model = Block::with('area', 'building', 'blockLocation', 'relBlock');
        if($request->area_guid) {
            $model = $model->where(['area_guid' => $request->area_guid]);
        }
        return $model->paginate($request->per_page??10);
    }

    // 修改商圈
    public function updateBlock(
        $request,
        Block $block
    )
    {
        \DB::beginTransaction();
        try {
            $relBlock = RelBlock::where('block_guid', $block->guid)->first();
            if ($relBlock) {
                $result = RelBlock::where('block_guid', $block->guid)->update([
                    'recommend' => $request->recommend,
                    'agent_name' => $request->agent_name,
                    'agent_pic' => $request->agent_pic
                ]);
            } else {
                $result = RelBlock::create([
                    'block_guid' => $block->guid,
                    'recommend' => $request->recommend,
                    'agent_name' => $request->agent_name,
                    'agent_pic' => $request->agent_pic
                ]);
            }
            if (empty($result)) throw new \Exception('商圈关联数据修改失败');

            \DB::commit();
            return true;
        } catch(\Exception $exception) {
            \DB::rollBack();
            \Log::error('商圈修改失败'. $exception->getMessage());
            return false;
        }
    }

    // 商圈添加推荐
    public function addRecommend(
        $guid,
        $request
    )
    {
        $relBlock = RelBlock::where('block_guid', $guid)->first();

        if ($relBlock) {
            return RelBlock::where('block_guid', $guid)->update(['recommend' => $request->recommend]);
        } else {
            return RelBlock::create([
                'block_guid' => $guid,
                'recommend' => $request->recommend
            ]);
        }
    }
}