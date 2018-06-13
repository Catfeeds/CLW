<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPermissionGroup extends Model
{
    protected $table = 'permission_groups';

    protected $guarded = [];

    protected $connection = 'media';

}
