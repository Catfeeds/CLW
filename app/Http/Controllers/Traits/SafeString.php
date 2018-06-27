<?php

namespace App\Http\Controllers\Traits;

use Illuminate\Support\Facades\Crypt;

trait SafeString
{
    public function safeString()
    {
        $string = 'chulouwang'.date('Y-m-d',time());
        return Crypt::encryptString($string);
    }
}