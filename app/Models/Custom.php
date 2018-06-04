<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $guarded = [];

    protected $connection = 'media';
}
