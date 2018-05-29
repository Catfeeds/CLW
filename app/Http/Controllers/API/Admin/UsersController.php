<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Models\User;
use App\Repositories\UsersRepository;
use App\Services\UsersService;
use Illuminate\Http\Request;

class UsersController extends APIBaseController
{
    /**
     * 说明: 用户列表
     *
     * @param Request $request
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function index(
        Request $request,
        UsersRepository $repository
    )
    {
        $res = $repository->usersList($request);
        return $this->sendResponse($res,'用户列表获取成功');
    }

    /**
     * 说明: 用户基本信息
     *
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function show(
        User $user
    )
    {
        return $this->sendResponse($user, '用户基本信息获取成功');
    }

    /**
     * 说明: 统计信息
     *
     * @param $id
     * @param UsersRepository $repository
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function statisticsInfo(
        $id,
        UsersRepository $repository
    )
    {
        $res = $repository->statisticsInfo($id);
        return $this->sendResponse($res, '用户统计信息获取成功');

    }

    /**
     * 说明: 用户委托找房信息
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function userBespeakInfo(
        $id,
        UsersService $service
    )
    {
        $res = $service->userBespeakInfo($id);
        return $this->sendResponse($res, '用户委托找房信息获取成功');
    }

    /**
     * 说明: 用户投放房源信息
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function userThrowInInfo(
        $id,
        UsersService $service
    )
    {
        $res = $service->userThrowInInfo($id);
        return $this->sendResponse($res, '用户投放房源信息获取成功');
    }

    /**
     * 说明: 电话质询统计信息
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function telInquiryInfo(
        $id,
        UsersService $service
    )
    {
        $res = $service->telInquiryInfo($id);
        return $this->sendResponse($res, '电话质询统计信息获取成功');
    }
}