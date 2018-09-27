<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlockLocation extends Model
{
    protected $table = 'block_locations';

    protected $guarded = [];

    protected $connection = 'buildings';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    public function block()
    {
        return $this->belongsTo('App\Models\Block','block_guid', 'guid');
    }

}
