<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;

class BespeakStaController extends APIBaseController
{

    public function index(
        Request $request
    )
    {

        $times = array();
        for ($i=1;$i<=10;$i++){

            $now = strtotime(date('Y-m-d', time()));

            $times[] = date('Y-m-d H:i:s', strtotime(date('Y-m-d', $now-$i*60*60*24*3)));
        }
        dd($times);


    }


}