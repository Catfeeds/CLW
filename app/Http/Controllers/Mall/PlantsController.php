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

        $labelData = $service->labelData('绿植租摆', $labels);

        $plants = $service->getAllGoods($request, 'App\Models\Plant');
        return view('shop.list_plants',[
            'labelData' => $labelData,
            'plants' => $plants
        ]);
    }
}
