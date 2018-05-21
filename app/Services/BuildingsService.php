<?php

namespace App\Services;


class BuildingsService
{
    public function label($res)
    {
        if ($res->label) {
            $res->label_cn = true;
        } else {
            $res->label_cn = false;
        }
    }
}