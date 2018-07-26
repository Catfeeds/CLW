<?php

namespace App\Repositories;

use App\Models\GoodsHasLabel;
use App\Models\Plant;
use Illuminate\Database\Eloquent\Model;

class PlantsRepository extends Model
{
    // 绿植租摆商品列表
    public function plantList(
        $request
    )
    {
        return Plant::paginate($request->per_page??10);
    }

    // 添加绿植租摆商品
    public function addPlant(
        $request
    )
    {
        \DB::beginTransaction();
        try {
            // 添加绿植表
            $plant = Plant::create([
                'name' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
                'price_unit' => $request->price_unit,
                'details_url' => $request->details_url,
                'sales_volume' => $request->sales_volume
            ]);
            if (empty($plant)) throw new \Exception('写入绿植表失败！');

            // 添加标签
            foreach ($request->labels as $label) {
                $addLabels = GoodsHasLabel::create([
                    'goods_type' => 'App\Models\Plant',
                    'goods_id' => $plant->id,
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