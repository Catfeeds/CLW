<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class CategoriesRepository extends Model
{
     //商城大类列表管理
    public function CategoriesList($request)
    {
        return Category::paginate($request->per_page??10);
    }

    //添加商城大类
    public function addCategories($request)
    {
         return Category::create([
             'name' => $request->name,
             'route' => $request->route
         ]);
    }
    
    //修改商城大类
    public function updateCategories($request,$category)
    {
        $category->name = $request->name;
        $category->route = $request->route;
        if(!$category->save()) return false;
        return true;
    }
}