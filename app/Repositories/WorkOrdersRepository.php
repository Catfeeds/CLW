<?php

namespace App\Repositories;

use App\Handler\Common;
use App\Models\Agent;
use App\Models\Partake;
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
        if (empty($request->created_at)) {
            $time = [date('Y-m-d 00:00:00', strtotime('now')), date('Y-m-d 23:59:59', strtotime('now'))];
        } else {
            $time = $request->created_at;
        }
        $res = $res->whereBetween('created_at', $time);
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

    // 手机端工单列表
    public function mobileList($request)
    {
        // 查询该人员参与过的工单
        $work_order_guid = Partake::where('user_guid', $request->user_guid)->pluck('work_order_guid')->toArray();
        $work_order = WorkOrder::whereIn('guid', $work_order_guid);
        switch ($request->type) {
            case 1:
                $work_order = $work_order->where('status', 2);
                break;
            case 2:
                $work_order = $work_order->whereIn('status', [3, 4]);
        }
        $work_order = $work_order->paginate(3);
        $data = [];
        foreach ($work_order as $k => $v) {
            $data[$k]['guid'] = $v->guid;
            $data[$k]['gd_identifier'] = $v->gd_identifier;
            $data[$k]['created_at'] = $v->created_at->format('Y-m-d H:i:s');
            $data[$k]['demand'] = $v->demand_cn;
            $data[$k]['area'] = $v->area_name;
            $data[$k]['building'] = $v->building_name;
            $data[$k]['acreage'] = $v->acreage;
            $data[$k]['price'] = $v->price;
            $data[$k]['remark'] = $v->remark;
        }
        return $work_order->setCollection(collect($data));
    }

    // 工单详情
    public function getShow($workOrder, $user_guid = null)
    {
        $data = [];
        $data['guid'] = $workOrder->guid;
        $data['gd_identifier'] = $workOrder->gd_identifier;
        $data['source'] = $workOrder->source_cn;
        $data['created_at'] = $workOrder->created_at->format('Y-m-d H:i:s');
        $data['source_area'] = $workOrder->source_area;
        $data['demand'] = $workOrder->demand;
        $data['demand_cn'] = $workOrder->demand_cn;
        $data['name'] = $workOrder->name;
        $data['tel'] = $workOrder->tel;
        $data['area'] = $workOrder->area_name;
        $data['building'] = $workOrder->building_name;
        $data['acreage'] = $workOrder->acreage;
        $data['price'] = $workOrder->price;
        $data['remark'] = $workOrder->remark;
        $data['schedule'] = $workOrder->schedule;
        $data['distribution'] = false; // 分配
        $data['determine'] = false;  // 确定
        $data['operate'] = false;  // 操作
        // 工单未结束
        if ($workOrder->status != 3 && $workOrder->status != 4) {
            // 如果查看人是管理层 并且工单未分配
            if ($workOrder->manage_guid == $user_guid && $workOrder->manage_deal == null) {
                $data['distribution'] = true;
            }
            // 如果查看人是处理人 并且工单未确定
            if ($workOrder->handle_guid ==$user_guid && $workOrder->handle_deal == null) {
                $data['determine'] = true;
            }
            // 如果查看人是处理人 并且工单已确定
            if ($workOrder->handle_guid == $user_guid && $workOrder->handle_deal != null) {
                $data['operate'] = true;
            }
        }
        return $data;
    }

    // 投放委托 生成工单/进度
    public function addWorkOrder($request)
    {
        \DB::beginTransaction();
        try {
            $last = WorkOrder::orderBy('created_at', 'asc')->get()->last();
            $identifier = Common::identifier($last);
            // 添加工单
            $workOrder = WorkOrder::create([
                'guid' => Common::getUuid(),
                'gd_identifier' => $identifier,
                'name' => $request->appellation,
                'tel' => $request->tel,
                'source' => $request->source,
                'page_source' => $request->page_source,
                'demand' => $request->demand,
                'area_name' => $request->area_name,
                'building_name' => $request->building_name,
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
            return $workOrder;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('添加失败'.$exception->getMessage());
            return false;
        }
    }

    // 客服下发工单
    public function issue($request)
    {
        $record = Common::user();
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->first();
            $res->recorder = $record->nick_name;
            $res->issue = $this->time;
            $res->manage_guid = $request->manage_guid;
            $res->status = 2;
            if (!$res->save()) throw new \Exception('工单下发失败');
            $str = $this->getUser($request->manage_guid);
            $content = '客服'. $record->nick_name.'将工单分配给'.$str;
            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');

            // 添加参与人
            if (empty($this->getPartake($request->guid, $request->manage_guid))) {
                   $partake = $this->addPartake($request->guid, $request->manage_guid);
                   if (empty($partake)) throw new \Exception('参与人添加失败');
            }
            \DB::commit();
            return $res;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('工单下发失败'.$exception->getMessage());
            return false;
        }
    }

    // 客服重新分配工单
    public function reset($request)
    {
        $record = Common::user();
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->first();
            $res->recorder = $record->nick_name;
            $res->issue = $this->time;
            $res->manage_guid = $request->manage_guid;
            $res->manage_deal = null;
            $res->handle_guid = null;
            $res->handle_deal = null;

            if (!$res->save()) throw new \Exception('工单下发失败');

            // 添加工单进度
            $str = $this->getUser($request->manage_guid);
            $content = '客服'. $record->nick_name.'将工单重新分配给'.$str;
            $schedule = Common::addSchedule($request->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');

            // 添加参与人
            if (empty($this->getPartake($request->guid, $request->manage_guid))) {
                $partake = $this->addPartake($request->guid, $request->manage_guid);
                if (empty($partake)) throw new \Exception('参与人添加失败');
            }
            \DB::commit();
            return $res;
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
            $res = WorkOrder::where('guid',$request->guid)->first();
            $res->handle_guid = $request->handle_guid;
            $res->manage_deal = $this->time;

            if (!$res->save()) throw new \Exception('工单分配失败');

            // 添加工单进度
            $content = '工单分配给'.$this->getUser($request->handle_guid);
            $schedule = Common::addSchedule($request->guid,$content);
            if (empty($schedule)) throw new \Exception('工单进度生成失败');

            // 添加参与人
            if (empty($this->getPartake($request->guid, $request->handle_guid))) {
                $partake = $this->addPartake($request->guid, $request->handle_guid);
                if (empty($partake)) throw new \Exception('参与人添加失败');
            }
            \DB::commit();
            return $res;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('添加失败'.$exception->getMessage());
            return false;
        }
    }

    // 确认收到工单
    public function confirm($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid',$request->guid)->first();
            $res->handle_deal = $this->time;
            if (!$res->save()) throw new \Exception('确认收到工单失败');
            // 添加工单进度
            $content = '确定收到工单'.$this->getUser($res->handle_guid);
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
            dd(123);
            $res = WorkOrder::where('guid', $request->guid)->first();
            dd($res);
            $res->identifier = $request->identifier;
            $res->status = 3;
            if (!$res->save()) throw new \Exception('操作失败');
            if ($res->demand == 1) {
                $demand = '房源编号 ';
            } elseif ($res->demand == 2) {
                $demand = '客源编号 ';
            }
            $str = $this->getUser($request->handle_guid);
            $content = '工单结束:'. $demand.$request->identifier.$str;
            // 添加工单进度
            $schedule = Common::addSchedule($request->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
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
            $res = WorkOrder::where('guid', $request->guid)->first();
            $res->reason = $request->reason;
            $res->status = 4;
            if (!$res->save()) throw new \Exception('操作失败');
            // 添加工单进度
            $str = $this->getUser($request->handle_guid);
            $content = '工单结束:'. $request->reason.$str;
            $schedule = Common::addSchedule($request->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('操作失败'.$exception->getMessage());
            return false;
        }
    }

    // 工单添加跟进
    public function addTrack($request)
    {
        $str = $this->getUser($request->handle_guid);
        $content = $request->track.$str;
        return Common::addSchedule($request->guid, $content);
    }

    // 回转工单
    public function rotate($request)
    {
        \DB::beginTransaction();
        try {
            $res = WorkOrder::where('guid', $request->guid)->first();
            $res->manage_deal = null;
            $res->handle_guid = null;
            $res->handle_deal = null;
            if (!$res->save()) throw new \Exception('操作失败');
            // 添加工单进度
            $str = $this->getUser($request->handle_guid);
            $content = '工单回转:'. $request->reason.$str;
            $schedule = Common::addSchedule($request->guid, $content);
            if (empty($schedule)) throw new \Exception('工单进度添加失败');
            \DB::commit();
            return $res;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('操作失败'.$exception->getMessage());
            return false;
        }
    }

    // 查询该工单，用经纪人是否存在参与表
    public function getPartake($guid, $user_guid)
    {
        return Partake::where(['work_order_guid' => $guid, 'user_guid' => $user_guid])->first();
    }
    
    // 添加工单参与人
    public function addPartake($guid, $user_guid)
    {
        return Partake::create([
            'guid' => Common::getUuid(),
            'work_order_guid' => $guid,
            'user_guid' => $user_guid
        ]);
    }

    // 通过openid获取经纪人guid
    public function getUserGuid($openid)
    {
        return Agent::where('openid', $openid)->value('guid');
    }

    // 获取人员称呼
    public function getUser($guid)
    {
        $user = Agent::where('guid', $guid)->first();
        // 管理层
        if ($user->work_order) {
            $str = ' ('.$user->name. '-'. $user->work_order_cn. '-'. $user->company->name. ')';
        } else {
            $str = ' ('.$user->name. '-'. $user->companyFramework->name. '-'. $user->role->name.')';
        }
        // dd($str);
        return $str;
    }

}