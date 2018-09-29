<?php

namespace App\Repositories;

use App\Handler\Common;
use App\Models\Participant;
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
        switch ($request->type) {
            case 1:
                $res = WorkOrder::where('status',1);
                break;
            case 2:
                $res = WorkOrder::where('status',2);
                break;
            case 3:
                $res = WorkOrder::whereIn('status', [3, 4]);
                break;
        }
        $res = $res->paginate($request->per_page??10);
        $data = [];
        foreach ($res as $k => $v) {
            $data[$k]['guid'] = $v->guid;
            $data[$k]['gd_identifier'] = $v->gd_identifier;
            $data[$k]['created_at'] = $v->created_at->format('Y-m-d H:i:s');
            $data[$k]['demand'] = $v->demand_cn;
            $data[$k]['remark'] = $v->remark;
        }
        return $res->setCollection(collect($data));
    }

    // 工单详情
    public function getShow($workOrder)
    {
        $data = [];
        $data['guid'] = $workOrder->guid;
        $data['gd_identifier'] = $workOrder->gd_identifier;
        $data['source'] = $workOrder->source_cn;
        $data['created_at'] = $workOrder->created_at->format('Y-m-d H:i:s');
        $data['source_area'] = $workOrder->source_area;
        $data['demand'] = $workOrder->demand_cn;
        $data['name'] = $workOrder->name;
        $data['tel'] = $workOrder->tel;
        $data['area'] = $workOrder->area;
        $data['building'] = $workOrder->building;
        $data['acreage'] = $workOrder->acreage;
        $data['price'] = $workOrder->price;
        $data['remark'] = $workOrder->remark;
        $data['schedule'] = $workOrder->schedule;
        return $data;
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

    // 客服下发工单
    public function issue($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)
                            ->update([
                                'recorder' => $request->recorder,
                                'issue' => $this->time,
                                'manage_guid' => $request->manage_guid,
                                'status' => '2'
                            ]);
            if (!$res) throw new \Exception('工单下发失败');

            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, '123123');
            if (empty($schedule)) throw new \Exception('工单进度添加失败');

            // 添加参与人
            $participant = Participant::where([
                'work_order_guid' => $request->guid,
                'user_guid' => $request->manage_guid
            ])->first();
            if (empty($participant)) {
                $record = Participant::create([
                    'guid' => Common::getUuid(),
                    'work_order_guid' => $request->guid,
                    'user_guid' => $request->manage_guid
                ]);
                if (empty($record)) throw new \Exception('参与人添加失败');
            }
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('工单下发失败'.$exception->getMessage());
            return false;
        }
    }

    // 客服重新分配工单
    public function reset($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)
                ->update([
                    'recorder' => $request->recorder,
                    'issue' => $this->time,
                    'manage_guid' => $request->manage_guid,
                    'manage_deal' => null,
                    'handle_guid' => null,
                    'handle_deal' => null
                ]);
            if (!$res) throw new \Exception('工单下发失败');

            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, '123123');
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('工单下发失败'.$exception->getMessage());
            return false;
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


    // 有效工单
    public function valid($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->update(['identifier' => $request->identifier, 'status' => 3]);
            if (!$res) throw new \Exception('操作失败');

            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, $request->identifier);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
            // 添加工单进度
            $content = '工单分配给('.$request->content.')';

            $schedule = Common::addSchedule($request->guid,$content);
            if (empty($schedule)) throw new \Exception('工单进度生成失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('操作失败'.$exception->getMessage());
            return false;
        }
    }

    // 无效工单
    public function invalid($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->update(['reason' => $request->reason, 'status' => 4]);
            if (!$res) throw new \Exception('操作失败');

            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, $request->reason);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('操作失败'.$exception->getMessage());
            return false;
        }
    }

    // 回转工单
    public function rotate($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->update([
                'manage_deal' => null,
                'handle_guid' => null,
                'handle_deal' => null
            ]);
            if (!$res) throw new \Exception('操作失败');

            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, '工单回转：'.$request->reason);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');

            // 将回转人变成工单参与人
            $participant = Participant::create([
                'guid' => Common::getUuid(),
                'work_order_guid' => $request->guid,
                'user_guid' => $request->suer_guid
            ]);
            if (empty($participant)) throw new \Exception('工单参与人添加失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('操作失败'.$exception->getMessage());
            return false;
        }
            \Log::error('添加失败',$exception->getMessage());
            return false;
    }







}