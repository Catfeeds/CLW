<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Services\LabelsService;
use Illuminate\Http\Request;

class ComputersController extends Controller
{
    // 电脑租售
    public function index(
        Request $request,
        LabelsService $service
    )
    {
        $labels = Label::getLabelByCategoryName('电脑租售');
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
        $labelData = $service->labelData('电脑租售', $labels, $request);
        $computer = $service->getAllGoods($request, 'App\Models\Computer');
        return view('shop.list',[
            'labelData' => $labelData,
            'datas' => $computer,
            'sort' => $sort,
            'symbol' => $symbol
        ]);
    }

    public function show()
    {
        dd('电脑租售详情');
    }
}
