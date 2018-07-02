<?php

namespace App\Http\Controllers\Traits;

use \Illuminate\Support\Facades\Hash;

trait SafeString
{
    public function safeString()
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        return Hash::make($string);
    }
}