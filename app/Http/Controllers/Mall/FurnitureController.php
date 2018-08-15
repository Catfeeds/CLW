<?php

namespace App\Http\Controllers\Mall;

use App\Http\Controllers\Controller;
use App\Models\Label;
use App\Services\LabelsService;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    // 办公家具
    public function index(
        Request $request,
        LabelsService $service
    )
    {
        $ResAll = $request->all();
        $labels = Label::getLabelByCategoryName('办公家具');
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
        $labelData = $service->labelData('办公家具', $labels, $request);
        $furniture = $service->getAllGoods($request, 'App\Models\Furniture');
        $price = 'desc';
        if(!empty($ResAll['price'])&&$ResAll['price']==='desc') {
            $price = 'asc';
        }
        $price = 'price='.$price;
        return view('shop.list',[
            'labelData' => $labelData,
            'datas' => $furniture,
            'sort' => $sort,
            'symbol' => $symbol,
            'request' => $ResAll,
            'price' => $price
        ]);
    }
    public function show()
    {
        dd('办公家具详情');
    }
}
