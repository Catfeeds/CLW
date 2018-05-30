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
        // 最后一条登录记录
        $lastLoginRecord = $user->LoginRecord->last();
        if (!empty($lastLoginRecord)) {
            $user->login_ip = $lastLoginRecord->login_ip;
            $user->login_city = $lastLoginRecord->login_city;
            $user->login_source = $lastLoginRecord->login_source;
            $user->login_time = $lastLoginRecord->created_at->format('Y-m-d H:i:s');
        }
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

    /**
     * 说明: 登录日志
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 罗振
     */
    public function loginLog(
        $id,
        UsersService $service
    )
    {
        $res = $service->loginLog($id);
        return $this->sendResponse($res, '登录日志信息获取成功');
    }

    /**
     * 说明: 用户启用
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 李振
     */
    public function enable(
        $id,
        UsersService $service
    )
    {
        $res = $service->enable($id);
        return $this->sendResponse($res, '启用成功');
    }

    /**
     * 说明: 用户禁用
     *
     * @param $id
     * @param UsersService $service
     * @return \Illuminate\Http\JsonResponse
     * @author 李振
     */
    public function disable(
        $id,
        UsersService $service
    )
    {
        $res = $service->disable($id);
        return $this->sendResponse($res, '启动失败');
    }
}