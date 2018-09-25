<?php

namespace App\Repositories;

use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class WorkOrdersRepository extends Model
{

    public function getList($request, $service)
    {
        $model = WorkOrder::with('shopkeeperUser','staffUser');
        if ($request->tel) $model = $model->where('tel', $request->tel);
        if ($request->demand) $model = $model->where('demand', $request->demand);
        if ($request->time) $model = $model->whereBetween('created_at', $request->time);
        if ($request->source) $model = $model->where('source', $request->source);
        // 获取转换率
//        $conversionRate = $service->getConversionRate($model);
        $item =  $model->latest()->paginate($request->per_page??10);
//        $service->getStaffInfo($item);
        return ['page' => $service->getGdInfo($item)];
    }
    
    
    public function addWorkOrder($request, $service)
    {
        \DB::beginTransaction();
        try {
            $workOrder = WorkOrder::create([
                'name' => $request->name,
                'tel' => $request->tel,
                'source'=> $request->source,
                'demand' => $request->demand,
                'position' => $request->position,
                'acreage' => $request->acreage,
                'price' => $request->price,
                'shopkeeper_guid' => $request->shopkeeper_guid,
                'remark' => $request->remark,
                'recorder' => $request->recorder,
                'created_at' => $request->created_at ? $request->created_at : date('Y-m-d H:i:s', time())
            ]);
            if (!$workOrder) throw new \Exception('工单添加失败');
            $workOrder->identifier = $service->setHouseIdentifier('gd',$workOrder->id);
            if (!$workOrder->save()) throw new \Exception('工单添加失败');
            \DB::commit();
            return $workOrder;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('工单添加失败'. $e->getMessage());
            return false;
        }
    }
}