<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MediaBlock extends Model
{
    protected $table = 'blocks';

    protected $guarded = [];

    protected $connection = 'media';
}
