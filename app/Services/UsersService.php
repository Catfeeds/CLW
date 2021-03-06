<?php

namespace App\Services;

use App\Models\Bespeak;
use App\Models\ConsultTel;
use App\Models\LoginRecord;
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
        return Bespeak::where('user_id', $id)->paginate(4);
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
        return ThrowIn::where('user_id', $id)->paginate(4);
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
        return ConsultTel::where('user_id', $id)->paginate(4);
    }

    /**
     * 说明: 登录日志
     *
     * @param $id
     * @return array
     * @author 罗振
     */
    public function loginLog($id)
    {
        return LoginRecord::where('user_id', $id)->paginate(20);
    }

    /**
     * 说明: 用户启用
     *
     * @param $id
     * @return mixed
     * @author 李振
     */
    public function enable($id)
    {
         return User::where(['id' => $id])->update(['status' => 1]);
    }

    /**
     * 说明: 用户禁用
     *
     * @param $id
     * @return mixed
     * @author 李振
     */
    public function disable($id)
    {
        return User::where(['id' => $id])->update(['status' => 2]);
    }
}