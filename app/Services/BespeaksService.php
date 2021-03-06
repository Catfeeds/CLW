<?php

namespace App\Services;

use App\Models\Bespeak;
use App\Models\MessageRecord;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class BespeaksService
{
    // 获取登录用户预约消息成功
    public function getUserBespeaks()
    {
        $user = Session::get('user');   // 获取登录用户id
        return Bespeak::where('user_id', $user->id)->get();
    }

    /**
     * 说明: 预约
     *
     * @param $request
     * @param null $source
     * @return bool
     * @author 罗振
     */
    public function addBespeaks(
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

            // 添加预约表
            $addBespeak = Bespeak::create([
                'tel' => $request->tel,
                'user_id' => empty($user)?null:$user->id,
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