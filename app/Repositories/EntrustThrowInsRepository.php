<?php

namespace App\Repositories;

use App\Models\EntrustThrowIn;
use App\Models\MessageRecord;
use App\Models\RawCustom;
use App\Models\WorkOrder;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EntrustThrowInsRepository extends Model
{
    //列表
    public function getList($request)
    {
        $res = EntrustThrowIn::whereBetween('created_at', $request->time);
        if (empty($request->type)) {
            $res =  $res->whereNotIn('source', [1, 2])->whereIn('demand', [1, 2, 3]);
        }
        if (!empty($request->type)) {
            $res =  $res->whereIn('source', [5, 6, 7, 8])->whereIn('demand', [1, 2]);
        }
        $res = $res->latest()->paginate($request->per_page??10);
        $data = [];
        foreach ($res as $k => $v) {
            $data[$k]['id'] = $v->id;
            $data[$k]['name'] = $v->name;
            $data[$k]['tel'] = $v->tel;
            $data[$k]['created_at'] = $v->created_at->format('Y-m-d H:i:s');
            $data[$k]['demand'] = $v->demand;
            $data[$k]['demand_cn'] = $v->demand_cn;
            $data[$k]['source'] = $v->source;
            $data[$k]['source_cn'] = $v->source_cn;
            $data[$k]['page_source'] = $v->page_source;
            $data[$k]['status'] = $v->status;
            $data[$k]['remark'] = $v->remark;

        }
        return $res->setCollection(collect($data));
    }

    //房源投放、委托找房
    public function add($request)
    {
        \DB::beginTransaction();
        try {
            // 通过手机号查询用户
            $user = User::where('tel', $request->tel)->first();
            $entrustThrowIn = EntrustThrowIn::create([
                'name' => $request->name,
                'tel' => $request->tel,
                'user_id' => empty($user)?null:$user->id,
                'area_id' => $request->area_id,
                'area_name' => $request->area_name,
                'block_id' => $request->block_id,
                'acreage' => $request->acreage,
                'building_name' => $request->building_name,
                'source' => $request->source,
                'page_source' => $request->page_source,
                'demand' => $request->demand,
                'remark' => $request->remark,
                'created_at' => $request->created_at? $request->created_at : date('Y-m-d H:i:s', time())
            ]);
            if (!$entrustThrowIn) throw new \Exception('失败');

            $message = MessageRecord::create([
                'model_type' => 'App\Models\EntrustThrowIn',
                'rel_id' => $entrustThrowIn->id
            ]);
            if (!$message) throw new \Exception('失败');
            \DB::commit();
            return true;
        }catch (\Exception $e) {
            \DB::rollBack();
            \Log::error($e->getMessage());
            return false;
        }
    }

    //回访
    public function survey($request)
    {
        return EntrustThrowIn::where('id', $request->id)->update(['status' => $request->status]);
    }

    //添加工单
    public function addGd($request, $service)
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
                'shopkeeper_id' => $request->shopkeeper_id,
                'remark' => $request->remark,
                'recorder' => $request->recorder
            ]);
            if (!$workOrder) throw new \Exception('工单添加失败');
            $workOrder->identifier = $service->setHouseIdentifier('gd', $workOrder->id);
            if (!$workOrder->save()) throw new \Exception('工单编号生成失败');

            $suc = EntrustThrowIn::where('id', $request->id)->update([
                'gd_id' => $workOrder->id,
                'status' => $workOrder->identifier
            ]);
            if (!$suc) throw new \Exception('状态更新失败');
            return true;
        } catch (\Exception $exception) {
            \Log::error('工单添加失败'. $exception->getMessage());
            return false;
        }
    }

    //工单发送消息
    public function send($openid, $name, $tel, $staff = false)
    {
        $data['openid'] = json_encode(array($openid));
        $data['name'] = $name;
        $data['tel'] = $tel;
        $data['staff'] = $staff;
        curl(config('setting.wechat_url').'/new_custom_notice','post', $data);
    }

}