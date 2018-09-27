<?php

namespace App\Repositories;

use App\Models\Area;
use App\Models\Block;
use App\Models\MessageRecord;
use App\Models\ThrowIn;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ThrowInsRepository extends Model
{
    /**
     * 说明: 添加投放房源
     *
     * @param $request
     * @param null $source
     * @return bool
     * @author 罗振
     */
    public function addThrowIn(
        $request,
        $source = null
    )
    {
        if (empty($source)) {
            $source = $request->source;
        }
        \DB::beginTransaction();
        try {
            // 通过手机号查询用户
            $user = User::where('tel', $request->tel)->first();

            $throwIn = ThrowIn::create([
                'tel' => $request->tel,
                'user_id' => empty($user)?null:$user->id,
                'appellation' => $request->appellation,
                'area_id' => $request->area_id,
                'area_name' => $request->area_name,
                'acreage' => $request->acreage,
                'block_id' => $request->block_id,
                'building_name' => $request->building_name,
                'source' => $source,
                'page_source' => $request->page_source
            ]);
            if (!$throwIn) throw new \Exception('投放房源添加失败');

            $message = MessageRecord::create([
                'model_type' => 'App\Models\ThrowIn',
                'rel_id' => $throwIn->id
            ]);
            if (!$message) throw new \Exception('投放房源添加失败');

            \DB::commit();
            return true;
        }catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            return false;
        }
    }

    public function getAreaData()
    {
        $data = [];
        //获取全部区域
        $area = Area::with('block')->get();
        foreach ($area as $k => $v) {
            $data[$k]['area_guid'] = $v->guid;
            $data[$k]['area_name'] = $v->name;
        }
        return $data;
    }

    public function getBlockData()
    {
        $data = [];
        $area_id = Area::all()->pluck('guid')->toArray();
        foreach ($area_id as $k => $v) {
            $data['area_'.$v] = Block::where('area_guid', $v)->get()->toArray();
        }
        return $data;
    }
}