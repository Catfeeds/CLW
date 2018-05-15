<?php

namespace App\Http\Controllers\API\Admin;

use App\Handler\SysLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SysLogController extends Controller
{
    public function index(SysLog $log)
    {
        $res = $log->get();
        return response($res, 200);
    }
}
