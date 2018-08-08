<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryServiceController extends Controller
{
   public function index()
   {
       return view('shop.list_clean');
   }

    public function water()
    {
        dd('桶装水');
    }

    public function houseMv()
    {
        return view('shop.list_moving');
    }
}
