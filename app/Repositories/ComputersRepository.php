<?php

namespace App\Repositories;

use App\Models\Computer;
use App\Models\GoodsHasLabel;
use Illuminate\Database\Eloquent\Model;

class ComputersRepository extends Model
{
    // 电脑租售商品列表
    public function computerList(
        $request
    )
    {
        return Computer::paginate($request->per_page??10);
    }

    // 添加电脑租售商品
    public function addComputer(
        $request
    )
    {
        \DB::beginTransaction();
        try {
            // 添加绿植表
            $plant = Computer::create([
                'name' => $request->name,
                'img' => $request->img,
                'price' => $request->price,
                'price_unit' => $request->price_unit,
                'details_url' => $request->details_url,
                'img' => $request->img
            ]);
            if (empty($plant)) throw new \Exception('写入电脑租售表失败！');

            // 添加标签
            foreach ($request->labels as $label) {
                $addLabels = GoodsHasLabel::create([
                    'goods_type' => 'App\Models\Computer',
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

    public function updateComputer(
        $request,
        $computer
    )
    {
        \DB::beginTransaction();
        try {
            $computer->name = $request->name;
            $computer->img = $request->img;
            $computer->price = $request->price;
            $computer->price_unit = $request->price_unit;
            $computer->details_url = $request->details_url;
            $computer->img = $request->img;
            if (!$computer->save()) throw new \Exception('电脑租售修改失败！');

            // 旧原始标签
            GoodsHasLabel::where([
                'goods_type' => 'App\Models\Computer',
                'goods_id' => $computer->id,
            ])->delete();

            // 添加标签
            foreach ($request->labels as $label) {
                $addLabels = GoodsHasLabel::create([
                    'goods_type' => 'App\Models\Computer',
                    'goods_id' => $computer->id,
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