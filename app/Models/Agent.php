<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $connection = 'chulou-saas';

    protected $table = 'users';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'work_order' => 'array',
    ];

    protected $appends = [
        'work_order_cn'
    ];

    // 用户关联角色
    public function role()
    {
        return $this->hasOne(AgentRole::class, 'guid', 'role_guid');
    }


    // 用户关联归属
    public function companyFramework()
    {
        return $this->belongsTo('App\Models\CompanyFramework','rel_guid','guid');
    }

    // 公司
    public function company()
    {
        return $this->belongsTo('App\Models\Company','company_guid','guid');
    }

    // 区域 work_order_cn
    public function getWorkOrderCnAttribute()
    {
        return empty($this->work_order)?'':implode(',',$this->work_order);
    }
}
