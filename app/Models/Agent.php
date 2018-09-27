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
        return $this->hasOne(Role::class, 'guid', 'role_guid');
    }
}
