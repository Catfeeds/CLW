<?php

namespace App\Services;

use App\Models\Bespeak;
use App\Models\ConsultTel;
use App\Models\ThrowIn;
use App\Models\User;

class UsersService
{
    /**
     * 说明: 用户委托找房信息
     *
     * @param $id
     * @return array
     * @author 罗振
     */
    public function userBespeakInfo($id)
    {
        $user = User::find($id);
        if (empty($user)) return ['status' => false, 'message' => '用户信息异常'];

        return Bespeak::where('tel', $user->tel)->paginate(4);
    }

    /**
     * 说明: 用户投放房源信息
     *
     * @param $id
     * @return array
     * @author 罗振
     */
    public function userThrowInInfo($id)
    {
        $user = User::find($id);
        if (empty($user)) return ['status' => false, 'message' => '用户信息异常'];

        return ThrowIn::where('tel', $user->tel)->paginate(4);
    }

    /**
     * 说明: 电话质询统计信息
     *
     * @param $id
     * @return array
     * @author 罗振
     */
    public function telInquiryInfo($id)
    {
        $user = User::find($id);
        if (empty($user)) return ['status' => false, 'message' => '用户信息异常'];

        return ConsultTel::where('user_id', $id)->paginate(4);
    }
}