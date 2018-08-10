<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyDecoratController extends Controller
{
    public function index()
    {
        return view('shop.decoration_company');
    }
    public function show()
    {
        dd('企业装修详情');
    }
    public function wiring()
    {
        return view('shop.decoration');
    }
}
