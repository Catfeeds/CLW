<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        'wechat',
        'registers',
        'logins',
        'reset_pwd',
        'old_tel_validate',
        'reset_tel',
        'throw_ins',
        'bespeaks',
        'quick_login',
        'collections',
        'add_employee',
    ];
}
