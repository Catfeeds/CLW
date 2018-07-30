<?php

namespace App\Http\Controllers\Mall;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryServiceController extends Controller
{
   public function index()
   {
       dd('入驻服务.保洁服务，室内环保服务');
   }

    public function water()
    {
        dd('桶装水');
    }

    public function houseMv()
    {
        dd('搬家');
    }
}
