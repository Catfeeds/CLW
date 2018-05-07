<?php
namespace App\Http\Controllers\API\App;

use App\Http\Controllers\API\APIBaseController;
use App\Repositories\SystemNoticesRepository;

class SystemNoticesController extends APIBaseController
{
    /**
     * 说明: 系统公告列表
     * @param SystemNoticesRepository $systemNoticesRepository
     * @return \Illuminate\Http\JsonResponse
     * @author 王成
     */
    public function index
    (
        SystemNoticesRepository $systemNoticesRepository
    )
    {
        $result = $systemNoticesRepository->SystemNoticesList();
        return $this->sendResponse($result, '系统公告列表获取成功');
    }
}