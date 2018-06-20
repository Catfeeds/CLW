<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    use HasRoles;

    protected $guard_name = 'web';

    protected $table = 'users';

    protected $guarded = [];

    protected $connection = 'media';

}
