<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AreaLocation extends Model
{
    protected $table = 'area_locations';

    protected $guarded = [];

    protected $connection = 'media';
}
