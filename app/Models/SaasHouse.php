<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaasHouse extends Model
{
    protected $connection = 'chulou-saas';

    protected $table = 'houses';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $guarded = [];

    protected $casts = [
        'owner_info' => 'array',
        'cost_detail' => 'array',
        'support_facilities' => 'array',
        'indoor_img' => 'array',
        'house_type_img' => 'array',
        'outdoor_img' => 'array',
        'relevant_proves_img' => 'array'
    ];
}
