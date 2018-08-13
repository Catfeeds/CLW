<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhotoAdsController extends Controller
{
    public function index(Request $request)
    {
        return view('shop.serviceList', ['adsId'=>$request->id]);
    }

    // public function businessPrint()
    // {
    //     dd('商务印品');
    // }

    // public function businessAds()
    // {
    //     dd('企业广告');
    // }
}
