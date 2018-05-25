<?php

namespace App\Observers;

class ThrowInObservers {

    public function created()
    {
        \Log::info('房源投放成功,发送短信');
    }
}