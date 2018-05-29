<?php

namespace App\Services;

use App\Models\Bespeak;
use App\Models\MessageRecord;

class BespeaksService
{
    /**
     * 说明: 预约
     *
     * @param $request
     * @param $source
     * @return bool
     * @author 罗振
     */
    public function addBespeaks(
        $request,
        $source
    )
    {
        \DB::beginTransaction();
        try {
            // 添加预约表
            $addBespeak = Bespeak::create([
                'tel' => $request->tel,
                'appellation' => $request->appellation,
                'demand' => $request->demand,
                'source' => $source,
                'page_source' => $request->page_source
            ]);
            if (!$addBespeak) throw new \Exception('预约失败');

            // 添加消息记录表
            $addMessageRecord = MessageRecord::create([
                'model_type' => 'App\Models\Bespeak',
                'rel_id' => $addBespeak->id
            ]);
            if (!$addMessageRecord) throw new \Exception('添加预约消息记录失败');

            // TODO 发送信息

            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollBack();
            \Log::error($exception->getMessage());
            return false;
        }
    }
}