<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Models\Category;
use App\Repositories\CategoriesRepository;

class CategoriesController extends APIBaseController
{
   //商城大类列表

    public function index
    (
        CategoriesRepository $categoriesRepository
    )
    {
        $res = $categoriesRepository->CategoriesList();
        return $this->sendResponse($res,'商城大类列表获取成功');
    }


    //商城大类添加

    public function store
    (
        CategoriesRepository $categoriesRepository,
        CategoriesRequest $request
    )
    {
        $res = $categoriesRepository->addCategories($request);
        return $this->sendResponse($res,'商城大类添加成功');
    }

    //商城大类原始数据
    public function edit
    (
        Category $category
    )
    {
        return $this->sendResponse($category,'获取原始数据成功');
    }

    //商城大类修改
    public function update
    (
        CategoriesRepository $categoriesRepository,
        CategoriesRequest $request,
        Category $category
    )
    {
        $res = $categoriesRepository->updateCategories($request,$category);
        return $this->sendResponse($res,'商城大类修改成功');
    }

    //商城大类删除
    public function destroy($id)
    {
        //
    }
}
