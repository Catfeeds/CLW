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
        $ResAll = $request->all();
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

        $price = 'desc';
        if(!empty($ResAll['price'])&&$ResAll['price']==='desc') {
            $price = 'asc';
        }
        $price = 'price='.$price;
        return view('shop.list',[
            'labelData' => $labelData,
            'datas' => $computer,
            'sort' => $sort,
            'symbol' => $symbol,
            'request' => $ResAll,
            'price' => $price
        ]);
    }

    public function show()
    {
        dd('办公设备详情');
    }
}
