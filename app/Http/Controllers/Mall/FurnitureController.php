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
        return view('shop.list1',[
            'labelData' => $labelData,
            'datas' => $furniture,
            'sort' => $sort,
            'symbol' => $symbol
        ]);
    }
    public function show($id)
    {
        if($id == '1')
        return view('shop.pantai');
        if($id == '2')
        return view('shop.proscenium');
        if($id == '3')
        return view('shop.meeting_desk');
        if($id == '4')
        return view('shop.desk');
        if($id == '5')
        return view('shop.sofa');
    }
}
