<?php

namespace App\Repositories;

use App\Models\Block;
use App\Models\BlockLocation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class BlocksRepository extends Model
{
    // 商圈列表
    public function blockList($request)
    {
        $model = Block::with('area', 'building', 'blockLocation');
        if($request->area_id) {
            $model = $model->where(['area_id'=>$request->area_id]);
        }
        return $model->paginate($request->per_page??10);

    }

    // 添加商圈
    public function addBlock(
        $request
    )
    {
        DB::connection('mysql')->beginTransaction();
        DB::connection('media')->beginTransaction();
        try {
             $block = Block::create([
                'name' => $request->name,
                'area_id' => $request->area_id,
                'recommend' => $request->recommend,
                'agent_name' => $request->agent_name,
                'agent_pic' => $request->agent_pic,
            ]);
            if (empty($block)) throw new \Exception('商圈添加失败');
            $blockLocation = BlockLocation::create([
                    'block_id' => $block->id,
                    'x' => $request->x,
                    'y' => $request->y,
                    'scope' => $request->baidu_coord
                ]);
            if (empty($blockLocation)) throw new \Exception('商圈地理范围添加失败');
            DB::connection('mysql')->commit();
            DB::connection('media')->commit();
            return true;
        } catch (\Exception $exception) {
            DB::connection('mysql')->rollBack();
            DB::connection('media')->rollBack();
            \Log::error('商圈添加失败'. $exception->getMessage());
            return false;
        }

    }

    // 修改商圈
    public function updateBlock(
        $request,
        Block $block
    )
    {
        DB::connection('mysql')->beginTransaction();
        DB::connection('media')->beginTransaction();
        try {
            $block->name = $request->name;
            $block->area_id = $request->area_id;
            $block->recommend = $request->recommend;
            $block->agent_name = $request->agent_name;
            $block->agent_pic = $request->agent_pic;
            if (!$block->save()) throw new \Exception('商圈修改失败');

            $blockLocation = BlockLocation::where('block_id', $block->id)->first();
            if (!empty($blockLocation)) {
                $blockLocation->x = $request->x;
                $blockLocation->y = $request->y;
                $blockLocation->scope = $request->baidu_coord;
                if (!$blockLocation->save()) throw new \Exception('商圈地理位置修改失败');
            } else {
                $res = BlockLocation::create([
                    'block_id' => $block->id,
                    'x' => $request->x,
                    'y' => $request->y,
                    'scope' => $request->baidu_coord
                ]);
                if (empty($res)) throw new \Exception('商圈地理位置创建失败');
            }

            DB::connection('mysql')->commit();
            DB::connection('media')->commit();
            return true;
        } catch(\Exception $exception) {
            DB::connection('mysql')->rollBack();
            DB::connection('media')->rollBack();
            \Log::error('商圈修改失败'. $exception->getMessage());
            return false;
        }
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