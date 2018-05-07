<?php

namespace App\Services;

class BespeaksService
{
    public function addBespeaks($request)
    {
        \DB::beginTransaction();
        try {
            // 添加预约表
            


            // 添加消息记录表



            // 发送信息


            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollBack();
            \Log::error($exception->getMessage());
            return false;
        }
    }
}