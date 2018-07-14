<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $guarded = [];

    protected $connection = 'media';

    protected $appends = [
        'agent_pic_cn', 'agent_name'
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Area','area_id','id');
    }

    public function building()
    {
        return $this->hasMany('App\Models\Building','block_id', 'id');
    }

    public function blockLocation()
    {
        return $this->belongsTo('App\Models\BlockLocation', 'id','block_id');
    }

    public function getAgentPicCnAttribute()
    {
        if (empty($this->agent_pic)) return config('setting.block_agent_default_img');
        return config('setting.qiniu_url').$this->agent_pic;
    }

    public function getAgentNameAttribute()
    {
        if (empty($this->agent_name)) return '程达';
        return $this->agent_name;
    }
}
