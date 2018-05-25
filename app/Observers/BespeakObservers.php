<?php

namespace App\Observers;

class BespeakObservers {

    public function created()
    {
        \Log::info('预约成功,发送短信');
    }
}