<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryServiceController extends Controller
{
//    public function index(Request $request)
//    {
//        return view('shop.serviceList', ['serveid'=>$request->id]);
//    }
    public function show($id)
    {   
        if($id==='1')
        return view('shop.list_clean_common', ['titleName'=>'入驻服务', 'serveid'=>$id]);
        else if($id==='2')
        return view('shop.list_clean', ['titleName'=>'入驻服务', 'serveid'=>$id]);
        else if($id==='3')
        return view('shop.move', ['titleName'=>'入驻服务', 'serveid'=>$id]);
        else if($id==='4')
        return view('shop.indoor_protection', ['titleName'=>'入驻服务', 'serveid'=>$id]);
        else if($id==='5')
        return view('shop.mineral_water', ['titleName'=>'入驻服务', 'serveid'=>$id]);
    }
}
