<?php

namespace App\Repositories;

use App\Models\EntrustThrowIn;
use App\Models\MessageRecord;
use App\Models\RawCustom;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class EntrustThrowInsRepository extends Model
{
    //列表
    public function getList($request)
    {
        return EntrustThrowIn::paginate($request->per_page??10);
    }

    //房源投放、委托找房
    public function add($request, $source = null)
    {
        if (empty($source)) {
            $source = $request->source;
        }
        \DB::beginTransaction();
        try {
            // 通过手机号查询用户
            $user = User::where('tel', $request->tel)->first();

            $entrustThrowIn = EntrustThrowIn::create([
                'appellation' => $request->appellation,
                'tel' => $request->tel,
                'user_id' => empty($user)?null:$user->id,
                'area_id' => $request->area_id,
                'area_name' => $request->area_name,
                'block_id' => $request->block_id,
                'acreage' => $request->acreage,
                'building_name' => $request->building_name,
                'source' => $source,
                'page_source' => $request->page_source,
                'type' => $request->type,
                'demand' => $request->demand
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
         DB::connection('mysql')->beginTransaction();
         DB::connection('media')->beginTransaction();
        try {
            $custom = RawCustom::create([
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
            if (!$custom) throw new \Exception('工单添加失败');
            $custom->identifier = $service->setHouseIdentifier('gd', $custom->id);
            if (!$custom->save()) throw new \Exception('工单编号生成失败');

            $suc = EntrustThrowIn::where('id', $request->id)->update([
                'gd_id' => $custom->id,
                'status' => $custom->identifier
            ]);
            if (!$suc) throw new \Exception('状态更新失败');
            DB::connection('mysql')->commit();
            DB::connection('media')->commit();
            return true;
        } catch (\Exception $exception) {
            DB::connection('mysql')->rollBack();
            DB::connection('media')->rollBack();
            \Log::error('工单添加失败'. $exception->getMessage());
            return false;
        }
    }

}