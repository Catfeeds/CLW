<?php

namespace App\Http\Controllers\We;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\AreasRepository;

class UserController extends Controller
{
    public function index()
    {
       return view('we.user_index');
    }
    public function findHouse()
    {
       return view('we.user_find_house');
    }
    public function resources(AreasRepository $repository)
    {
        $res = $repository->areaList();
        $data = $res->map(function($v) {
            return [
                'value' => $v->id,
                'text' => $v->name
            ];
        });
       return view('we.user_house_resources', ['res' => $data]);
    }
    public function aboutUs()
    {
       return view('we.user_about_us');
    }
    public function setting()
    {
       return view('we.user_setting');
    }
    public function revisePwd()
    {
       return view('we.user_revise_password');
    }
    public function revisePhone1()
    {
       return view('we.user_revise_phone1');
    }
    public function revisePhone2()
    {
       return view('we.user_revise_phone2');
    }
}
