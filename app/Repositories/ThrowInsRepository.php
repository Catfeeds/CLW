<?php

namespace App\Repositories;

use App\Models\MessageRecord;
use App\Models\ThrowIn;
use Illuminate\Database\Eloquent\Model;

class ThrowInsRepository extends Model
{
    public function addThrowIn($request)
    {
        \DB::beginTransaction();
        try {
            $throwIn = ThrowIn::create([
                'tel' => $request->tel,
                'appellation' => $request->appellation,
                'area_id' => $request->area_id,
                'block_id' => $request->block_id,
                'acreage' => $request->acreage,
                'building_name' => $request->building_name
            ]);
            if (!$throwIn) throw new \Exception('投放房源添加失败');
            $message = MessageRecord::create([
                'model_type' => 'App\Models\ThrowIn',
                'rel_id' => $throwIn->id
            ]);
            if (!$message) throw new \Exception('投放房源添加事变');
            \DB::commit();
            return true;
        }catch (\Exception $e) {
            \DB::rollBack();
            \Log::error('投放房源添加失败', $e->getMessage());
            return false;
        }
    }
}