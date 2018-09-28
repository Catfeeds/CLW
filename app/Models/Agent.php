<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $connection = 'saas';

    protected $table = 'users';

    protected $guarded = [];

    // 用户关联角色
    public function role()
    {
        return $this->hasOne(AgentRole::class, 'guid', 'role_guid');
    }

    //用户关联归属
    public function companyFramework()
    {
        return $this->belongsTo('App\Models\CompanyFramework','rel_guid','guid');
    }
}
