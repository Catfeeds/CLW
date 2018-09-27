<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $guarded = [];

    protected $connection = 'buildings';

    // 如果使用的是非递增或者非数字的主键，则必须在模型上设置
    public $incrementing = false;

    // 主键
    protected $primaryKey = 'guid';

    // 主键类型
    protected $keyType = 'string';

    protected $appends = [
        'agent_pic_cn'
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Area','area_guid','guid');
    }

    public function building()
    {
        return $this->hasMany('App\Models\Building','block_guid', 'guid');
    }

    public function blockLocation()
    {
        return $this->belongsTo('App\Models\BlockLocation', 'guid','block_guid');
    }

    // 关联表
    public function relBlock()
    {
        return $this->belongsTo('App\Models\RelBlock','guid','block_guid');
    }

    public function getAgentPicCnAttribute()
    {
        if (empty($this->agent_pic)) return config('setting.block_agent_default_img');
        return config('setting.qiniu_url').$this->agent_pic;
    }

    public function getAgentNameAttribute()
    {
        return $this->getAttributes()['agent_name']??'程达';
    }
}
