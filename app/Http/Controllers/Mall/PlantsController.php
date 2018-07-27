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
        return view('shop.list_plants',[
            'labelData' => $labelData,
            'plants' => $plants,
            'sort' => $sort,
            'symbol' => $symbol
        ]);
    }
}
