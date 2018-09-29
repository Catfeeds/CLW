<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BusinessTaxesController extends Controller
{
    // public function index(Request $request)
    // {
    //     return view('shop.serviceList', ['finance'=>$request->id]);
    // }

    public function show($id)
    {   
        if($id==='1')
        return view('shop.charge', ['titleName'=>'工商财税', 'finance'=>$id]);
        else if($id==='2')
        return view('shop.general_taxpayer', ['titleName'=>'工商财税', 'finance'=>$id]);
        else if($id==='3')
        return view('shop.register', ['titleName'=>'工商财税', 'finance'=>$id]);
        else if($id==='4')
        return view('shop.tex_plant', ['titleName'=>'工商财税', 'finance'=>$id]);
    }

    // public function regist()
    // {
    //     return view('shop.list_register');
    // }
}
