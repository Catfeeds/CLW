<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentRole extends Model
{
    protected $connection = 'saas';

    protected $table = 'roles';
}
