<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RawCustomer extends Model
{
    protected $table = 'office_building_houses';

    protected $guarded = [];

    protected $connection = 'media';
}
