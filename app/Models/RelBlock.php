<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RelBlock extends Model
{
    protected $connection = 'mysql';

    protected $guarded = [];

    protected $appends = [
        'agent_pic_cn'
    ];

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
