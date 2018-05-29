<?php

namespace App\Repositories;

use App\Models\MessageRecord;
use App\Models\ThrowIn;
use Illuminate\Database\Eloquent\Model;

class ThrowInsRepository extends Model
{
    /**
     * 说明: 添加投放房源
     *
     * @param $request
     * @param $source
     * @return bool
     * @author 罗振
     */
    public function addThrowIn(
        $request,
        $source
    )
    {
        \DB::beginTransaction();
        try {
            $throwIn = ThrowIn::create([
                'tel' => $request->tel,
                'appellation' => $request->appellation,
                'area_id' => $request->area_id,
                'area_name' => $request->area_name,
                'acreage' => $request->acreage,
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
}