<?php

namespace App\Repositories;

use App\Models\Furniture;
use App\Models\GoodsHasLabel;
use Illuminate\Database\Eloquent\Model;

class FurnitureRepository extends Model
{
    // 办公家具商品列表
    public function furnitureList(
        $request
    )
    {
        return Furniture::paginate($request->per_page??10);
    }

    // 添加办公家具商品
    public function addFurniture(
        $request
    )
    {
        \DB::beginTransaction();
        try {
            // 添加绿植表
            $furniture = Furniture::create([
                'name' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
                'price_unit' => $request->price_unit,
                'details_url' => $request->details_url,
            ]);
            if (empty($furniture)) throw new \Exception('写入办公家具表失败！');

            // 添加标签
            foreach ($request->labels as $label) {
                $addLabels = GoodsHasLabel::create([
                    'goods_type' => 'App\Models\Furniture',
                    'goods_id' => $furniture->id,
                    'label_id' => $label
                ]);
                if (empty($addLabels)) throw new \Exception('添加关联表失败！');
            }
            // 提交事务
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
            return false;
        }
    }

    // 修改绿植租摆商品
    public function updateFurniture(
        $request,
        $furniture
    )
    {
        \DB::beginTransaction();
        try {
            $furniture->name = $request->name;
            $furniture->img = $request->img;
            $furniture->price = $request->price;
            $furniture->price_unit = $request->price_unit;
            $furniture->details_url = $request->details_url;
            if (!$furniture->save()) throw new \Exception('办公家具修改失败！');

            // 旧原始标签
            GoodsHasLabel::where([
                'goods_type' => 'App\Models\Furniture',
                'goods_id' => $furniture->id,
            ])->delete();

            // 添加标签
            foreach ($request->labels as $label) {
                $addLabels = GoodsHasLabel::create([
                    'goods_type' => 'App\Models\Furniture',
                    'goods_id' => $furniture->id,
                    'label_id' => $label
                ]);
                if (empty($addLabels)) throw new \Exception('添加关联表失败！');
            }
            // 提交事务
            \DB::commit();
            return true;
        } catch (\Exception $e) {
            \DB::rollBack();
            return false;
        }
    }
}