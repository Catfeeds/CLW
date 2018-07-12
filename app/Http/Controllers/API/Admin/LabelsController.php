<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\LabelsRequest;
use App\Models\Category;
use App\Models\Label;
use App\Repositories\LabelsRepository;
use App\Services\LabelsService;

class LabelsController extends APIBaseController
{

    //标签列表
    public function index
    (
        LabelsRequest $request,
        LabelsRepository $repository
    )
    {
        $res = $repository->labelList($request);
        return $this->sendResponse($res, '标签列表获取成功');
    }

    // 添加标签返回数据
    public function create()
    {
        // 返回所有大类
        $categorys = Category::all();
        return $this->sendResponse($categorys->map(function ($v) {
            return [
                'value' => $v->id,
                'name' => $v->name
            ];
        }), '获取所有大类成功');
    }

    //添加标签
    public function store
    (
        LabelsRequest $request,
        LabelsRepository $repository
    )
    {
        $res = $repository->addLabel($request);
        return $this->sendResponse($res, '标签添加成功');
    }

    //修改标签之前原始数据
    public function edit(Label $label)
    {
        return $this->sendResponse($label,'标签修改之前原始数据');
    }

    //修改标签
    public function update
    (
        Label $label,
        LabelsRepository $repository,
        LabelsRequest $request
    )
    {
        $res = $repository->updateLabel($label, $request);
        if (!$res) return $this->sendError('标签修改失败');
        return $this->sendResponse($res,'标签修改成功');
    }

    //删除标签
    public function destroy(Label $label)
    {
        $label->delete();


//        //如果等级为1,判断下面有没有子类
//        if ($label->stage == 1) {
//            $item = Label::where('parent_id', $label->id)->get();
//            if (!$item->isEmpty()) return $this->sendError('该标签下还有子类,无法删除');
//        }
//        $res = $label->delete();
//        return $this->sendResponse($res, '删除成功');
    }

    // 通过大类获取一级标签
    public function getParentByCategory(
        $categoryId,
        LabelsService $service
    )
    {
        $res = $service->getParentByCategory($categoryId);
        return $this->sendResponse($res->map(function($v) {
            return [
                'value' => $v->id,
                'name' => $v->name
            ];
        }), '通过大类获取一级标签成功');
    }
}
