<?php

namespace App\Models;

class Houses extends BaseModel
{
    protected $connection = 'mysql';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $casts = [
        'indoor_img' => 'array',
        'constru_acreage' => 'integer',
        'min_acreage' => 'integer',
        'unit_price' => 'integer',
        'total_price' => 'integer',
        'support_facilities'
    ];

}
