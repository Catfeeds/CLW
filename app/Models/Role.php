<?php

namespace App\Models;

class Role extends \Spatie\Permission\Models\Role
{
    protected $table = 'roles';

    protected $connection = 'media';

}