<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaasCustomer extends Model
{
    protected $connection = 'chulou-saas';

    protected $table = 'customers';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'customer_info' => 'array',
        'intention' => 'array',
        'block' => 'array',
        'building' => 'array',
        'house_type' => 'array',
    ];
}
