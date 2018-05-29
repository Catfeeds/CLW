<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // 不允许集体赋值的字段
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 说明: 获取token
     *
     * @return mixed
     * @author 罗振
     */
    public function getAccessTokenAttribute()
    {
        $token = $this->token();
        return $token->id;
    }

    /**
     * 说明: 自定义授权用户名（默认为手机号）
     *
     * @param $username
     * @return mixed
     * @author 罗振
     */
    public function findForPassport($username)
    {
        return User::where('tel', $username)->first();
    }

    /**
     * 说明: 预约
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author 罗振
     */
    public function Bespeak()
    {
        return $this->hasMany('App\Models\Bespeak','tel','tel');
    }

    /** 
     * 说明: 投放
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author 罗振
     */
    public function ThrowIn()
    {
        return $this->hasMany('App\Models\ThrowIn','tel','tel');
    }

    /**
     * 说明: 收藏
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author 罗振
     */
    public function Collection()
    {
        return $this->hasMany('App\Models\Collection','user_id','id');
    }

    /**
     * 说明: 电话咨询
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * @author 罗振
     */
    public function ConsultTel()
    {
        return $this->hasMany('App\Models\ConsultTel', 'user_id', 'id');
    }
}
