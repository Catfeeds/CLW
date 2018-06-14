<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPermissionGroup extends Model
{
    protected $table = 'permission_groups';

    protected $guarded = [];

    protected $connection = 'media';

    public function mediaPermission()
    {
        return $this->hasMany('App\Models\MediaPermission', 'group_id','id');
    }

}
