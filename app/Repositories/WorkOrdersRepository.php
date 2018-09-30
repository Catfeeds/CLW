<?php

namespace App\Repositories;

use App\Handler\Common;
use App\Models\Agent;
use App\Models\Schedule;
use App\Models\WorkOrder;
use Illuminate\Database\Eloquent\Model;

class WorkOrdersRepository extends Model
{
    protected $time;

    public function __construct()
    {
        $this->time = date('Y-m-d H:i:s', time());
    }

    // 工单列表 (页面)
    public function getList($request)
    {

    }

    // 投放委托 生成工单/进度
    public function addWorkOrder($request)
    {
        \DB::beginTransaction();
        try {
            // 添加工单
            $workOrder = WorkOrder::create([
                'guid' => Common::getUuid(),
                'gd_identifier' => 'gd'.time().rand(1,1000),
                'name' => $request->name,
                'tel' => $request->tel,
                'source' => $request->source,
                'source_area' => $request->source_area,
                'demand' => $request->demand,
                'area' => $request->area,
                'building' => $request->building,
                'acreage' => $request->acreage,
                'price' => $request->price,
                'remark' => $request->remark
            ]);

            if (empty($workOrder)) throw new \Exception('添加失败');
            // 生成工单进度
            $content = '客服接收工单';
            $schedule = Common::addSchedule($workOrder->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度生成失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('添加失败'.$exception->getMessage());
            return false;
        }
    }

    public function issue($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)
                            ->update([
                                'recorder' => $request->recorder,
                                'issue' => $this->time,
                                'manage_guid' => $request->manage_guid,
                                'status' => '2']);
            if (!$res->save()) throw new \Exception('工单下发失败');

            // 添加工单进度
//            $schedule = Schedule::create([
//                'guid' => Common::getUuid(),
//                'work_order_guid' => $request->guid,
//                'content' => '客服'. $request->recorder.'分配工单给 （'.
//            ]);


        } catch (\Exception $exception) {

        }

    }

    // 管理层分配工单
    public function allocation($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid',$request->guid)
                            ->update([
                                'handle_guid' => $request->handle_guid,
                                'manage_deal' => $this->time,
                            ]);
            if (!$res) throw new \Exception('工单分配失败');

            // 添加工单进度
            $content = '工单分配给('.$request->content.')';

            $schedule = Common::addSchedule($request->guid,$content);
            if (empty($schedule)) throw new \Exception('工单进度生成失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('添加失败',$exception->getMessage());
            return false;
        }
    }
    
    // 确认收到工单
    public function confirm($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid',$request->guid)
                ->update([
                    'handle_deal' => $this->time
                ]);
            if (!$res) throw new \Exception('确认收到工单失败');

            // 添加工单进度
            $content = '确定收到工单('.$request->content.')';

            $schedule = Common::addSchedule($request->guid,$content);
            if (empty($schedule)) throw new \Exception('工单进度生成失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('添加失败',$exception->getMessage());
            return false;
        }
    }

    // 获取给人员分配工单下拉数据
    public function getAllDistribution()
    {
        $res =Agent::with('company')->where(['status'=>1,'start_up'=>1,['openid','<>',null],['work_order','<>',null]])
            ->get();
        return $res->map(function ($v){
            return [
                'value' => $v->guid,
                'lable' => $v->name . '-' . $v->work_order_cn . '-' . $v->company->name
            ];
        });
    }
}