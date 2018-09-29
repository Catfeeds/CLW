<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyDecoratController extends Controller
{
    // public function index(Request $request)
    // {
    //     return view('shop.serviceList', ['id'=>$request->id]);
    // }
    public function show($id)
    {   
        if($id==='1')
        return view('shop.interior_decoration', ['titleName'=>'企业装修', 'id'=>$id]);
        else if($id==='2')
        return view('shop.colligate', ['titleName'=>'企业装修', 'id'=>$id]);
    }
}
