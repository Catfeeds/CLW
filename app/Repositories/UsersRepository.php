<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UsersRepository extends Model
{
    /**
     * 说明: 用户列表
     *
     * @param $request
     * @return mixed
     * @author 罗振
     */
    public function usersList($request)
    {
        return User::withCount('Bespeak')->withCount('ThrowIn')->withCount('ConsultTel')->paginate(5);
    }

    /**
     * 说明: 统计信息
     *
     * @param $id
     * @return mixed
     * @author 罗振
     */
    public function statisticsInfo($id)
    {
        return User::where('id', $id)->withCount('Bespeak')->withCount('ThrowIn')->withCount('Collection')->withCount('ConsultTel')->withCount('LoginRecord')->first();

    }
}