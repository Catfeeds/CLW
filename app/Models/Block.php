<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    protected $table = 'blocks';

    protected $guarded = [];

    protected $connection = 'media';

    protected $appends = ['buildings_number_cn'];

    /**
     * 说明: 获取该商圈下的所有楼盘
     *
     * @return mixed
     * @use buildings_number_cn
     * @author 刘坤涛
     */
    public function getBuildingsNumberCnAttribute()
    {
        return Building::where('block_id', $this->id)->count();
    }



}
