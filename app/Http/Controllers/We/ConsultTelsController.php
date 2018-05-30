<?php
namespace App\Http\Controllers\We;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\ConsultTelsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ConsultTelsController extends APIBaseController
{
    /**
     * 说明: 咨询统计信息添加
     *
     * @param Request $request
     * @param ConsultTelsRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function store(
        Request $request,
        ConsultTelsRepository $repository
    )
    {
        $user = Session::get('user');

        $res = $repository->addConsulTels($request, $user, '微信');
        return $this->sendResponse($res, '咨询统计信息添加成功');
    }
}