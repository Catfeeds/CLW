<?php

namespace App\Repositories;

use App\Handler\Common;
use App\Models\EntrustThrowIn;
use App\Models\WorkOrder;
use App\User;
use Illuminate\Database\Eloquent\Model;

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
        // 通过手机号查询用户
        $user = User::where('tel', $request->tel)->first();
        return EntrustThrowIn::create([
            'name' => $request->name,
            'tel' => $request->tel,
            'user_id' => empty($user)?null:$user->id,
            'area_guid' => $request->area_guid,
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
    }

    //回访
    public function survey($request)
    {
        return EntrustThrowIn::where('id', $request->id)->update(['status' => $request->status]);
    }

    //添加工单
    public function addGd($request)
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
                'recorder' => $request->recorder
            ]);
            if (!$workOrder) throw new \Exception('工单添加失败');

            $suc = EntrustThrowIn::where('id', $request->id)->update([
                'gd_guid' => $workOrder->guid,
                'status' => $workOrder->identifier
            ]);
            if (!$suc) throw new \Exception('状态更新失败');
            \DB::commit();
            return true;
        } catch (\Exception $exception) {
            \DB::rollback();
            \Log::error('工单添加失败'. $exception->getMessage());
            return false;
        }
    }
}