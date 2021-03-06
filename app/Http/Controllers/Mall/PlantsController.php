<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Services\LabelsService;
use Illuminate\Http\Request;

class PlantsController extends Controller
{
    // 绿植
    public function index(
        Request $request,
        LabelsService $service
    )
    {
        $ResAll = $request->all();
        $labels = Label::getLabelByCategoryName('绿植租摆');
        $sort = $request->url();
        $symbol = '?';
        if (!empty($request->labels) && !is_array($request->labels)) {
            $request->offsetSet('labels', explode('-',$request->labels));
            $data = array();

            foreach ($request->labels as $label){ 
                $data[] = $label;
            }
            $sort = $sort.'?labels='.implode('-', $data);
            $symbol = '&';
        }
        $labelData = $service->labelData('绿植租摆', $labels, $request);
        $plants = $service->getAllGoods($request, 'App\Models\Plant');

        $price = 'desc';
        if(!empty($ResAll['price'])&&$ResAll['price']==='desc') {
            $price = 'asc';
        }
        $price = 'price='.$price;
        return view('shop.list',[
            'labelData' => $labelData,
            'datas' => $plants,
            'sort' => $sort,
            'symbol' => $symbol,
            'request' => $ResAll,
            'price' => $price
        ]);
    }

    public function show($id)
    {
        if($id == '1')
        return view ('shop.plant_rent');
        if($id == '2')
        return view ('shop.plants1');
        if($id == '3')
        return view ('shop.plants2');
        if($id == '4')
        return view ('shop.plants3');
        if($id == '5')
        return view ('shop.plants4');
        if($id == '6')
        return view ('shop.plants5');
    }
}
