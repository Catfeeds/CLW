<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Admin extends Model
{
    use HasApiTokens, Notifiable;

    protected $guarded = [];

    /**
     * 说明:自定义授权用户名（默认为登录账号）
     *
     * @param $username
     * @return \Illuminate\Database\Eloquent\Model|null|static
     * @author 罗振
     */
    public function findForPassport($username)
    {
        return Admin::where('name', $username)->first();
    }

    /**
     * 说明: 获取token令牌
     *
     * @return mixed
     * @author 罗振
     */
    public function getAccessTokenAttribute()
    {
        $token = $this->token();
        return $token->id;
    }
}
