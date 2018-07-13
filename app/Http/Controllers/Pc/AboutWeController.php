<?php

namespace App\Http\Controllers\PC;

use App\Http\Controllers\Controller;
use App\Http\Requests\App\AboutWeRequest;

class AboutWeController extends Controller {

    public function about($info)
    {
        switch($info) {
            case 'telme' : 
                $title = '联系方式';
                break;
            case 'statute' : 
                $title = '使用协议';
                break;
            case 'privacy' : 
                $title = '隐私政策';
                break;
            default : 
                $title = '关于我们';
                $info = 'we';
                break;
        }
        return view('home.about_we', ['info' => $info, 'title' => $title]);
    }
}