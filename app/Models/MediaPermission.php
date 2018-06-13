<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaPermission extends Model
{
    protected $table = 'permissions';

    protected $guarded = [];

    protected $connection = 'media';

}
