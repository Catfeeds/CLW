<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Services\LabelsService;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
    // 办公设备
    public function index(
        Request $request,
        LabelsService $service
    )
    {
        $labels = Label::getLabelByCategoryName('办公设备');
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
        $labelData = $service->labelData('办公设备', $labels, $request);
        $computer = $service->getAllGoods($request, 'App\Models\Computer');
        return view('shop.list1',[
            'labelData' => $labelData,
            'datas' => $computer,
            'sort' => $sort,
            'symbol' => $symbol
        ]);
    }

    public function show($id)
    {
        if($id == '1')
        return view('shop.rent_computer');
        if($id == '2')
        return view('shop.pad');
    }
    public function nothing()
    {
        return view('shop.soon');
    }
}
