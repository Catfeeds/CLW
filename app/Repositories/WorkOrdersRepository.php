<?php

namespace App\Repositories;

use App\Handler\Common;
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
//        return ['page' => $service->getGdInfo($item), 'conversionRate' => $conversionRate];
        return ['page' => $service->getGdInfo($item)];
    }
    
    
    public function addWorkOrder($request)
    {
        \DB::beginTransaction();
        try {
            $workOrder = WorkOrder::create([
                'guid' => Common::getUuid(),
                'identifier' => 'gd'.time().rand(1,1000),
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
            \DB::commit();
            return $workOrder;
        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error('工单添加失败'. $e->getMessage());
            return false;
        }
    }

    // 更新工单
    public function updateWorkOrder($workOrder, $request)
    {
        $workOrder->name = $request->name;
        $workOrder->tel = $request->tel;
        $workOrder->source = $request->source;
        $workOrder->demand = $request->demand;
        $workOrder->position = $request->position;
        $workOrder->acreage = $request->acreage;
        $workOrder->price = $request->price;
        $workOrder->shopkeeper_guid = $request->shopkeeper_guid;
        $workOrder->remark = $request->remark;
        if (!$workOrder->save()) return false;
        return true;
    }

    // 店长分配工单
    public function distribution($request)
    {
        return WorkOrder::where('guid', $request->guid)->update(['staff_id'=> $request->staff_id, 'shopkeeper_deal' => date('Y-m-d H:i:s',time())]);
    }

    //店员确认工单
    public function determine($request)
    {
        return WorkOrder::where('guid', $request->id)->update(['staff_deal' => date('Y-m-d H:i:s',time())]);
    }

    //业务员反馈信息
    public function feedback($request)
    {
        return WorkOrder::where('guid', $request->id)->update(['feedback' => $request->feedback, 'valid' => $request->valid]);
    }

    // 手机端店长处理工单界面
    public function shopkeeperList($request, $service)
    {
        $guid = $service->getGuid($request->openid);
        switch ($request->status) {
            //待处理页面
            case 1 :
                return WorkOrder::where(['shopkeeper_guid' => $guid, 'shopkeeper_deal' => null])->latest('updated_at')->paginate(6);
                break;
            //已处理
            case 2:
                $item = WorkOrder::with('staffUser')->where('shopkeeper_guid', $guid)->where('shopkeeper_deal','!=', '')->latest('updated_at')->paginate(6);
                return $service->getInfo($item);
                break;
                default;
                break;
        }
    }

    // 手机端业务员处理页面
    public function staffList($request, $service)
    {
        $guid = $service->getGuid($request->openid);
        switch ($request->status) {
            case 1:
                return WorkOrder::where(['staff_deal' => null, 'staff_guid' => $guid])->latest('updated_at')->paginate(6);
                break;
            case 2:
                return WorkOrder::with('custom')->where('staff_deal', '!=', null)->where('staff_guid', $guid)->latest('updated_at')->paginate(6);
                break;
                default;
                break;
        }
    }
}