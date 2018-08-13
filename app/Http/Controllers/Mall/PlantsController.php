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
        $labels = Label::getLabelByCategoryName('绿植租摆');
        $sort = $request->url();
        $symbol = '?';
        if (!empty($request->labels)) {
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
        return view('shop.list',[
            'labelData' => $labelData,
            'datas' => $plants,
            'sort' => $sort,
            'symbol' => $symbol,
            'request' => $request->all()
        ]);
    }

    public function show($id)
    {
        // dd($id);
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
    }
}
