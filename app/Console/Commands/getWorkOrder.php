<?php

namespace App\Console\Commands;

use App\Handler\Common;
use App\Models\Agent;
use App\Models\EntrustThrowIn;
use App\Models\Partake;
use App\Models\RawCustom;
use App\Models\SaasCustomer;
use App\Models\SaasHouse;
use App\Models\Schedule;
use App\Models\WorkOrder;
use App\Repositories\WorkOrdersRepository;
use EasyWeChat\Message\Raw;
use Illuminate\Console\Command;

class getWorkOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getWorkOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '迁移工单数据';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 获取老工单数据
        $raw = RawCustom::with('house', 'customer')->get();
        foreach ($raw as $v) {
            $last = WorkOrder::orderBy('created_at', 'asc')->get()->last();
            $gd_identifier = Common::identifier($last);
            // 来源区域
            $record = EntrustThrowIn::where('status', $v->identifier)->first();
            if (empty($record->page_source)) {
                $page_source = '管理系统';
            } else {
                $page_source =  $record->page_source;
                if ($page_source == 'null') {
                    $page_source = '管理系统';
                }
            }

            // 工单状态
            if (empty($v->house) && empty($v->customer) && $v->valid == 2) {
                // 无效
                $status = 4;
                $reason = $v->feedback;
                $identifier = '';
            } elseif ($v->house) {
                // 有效  房源编号
                $status = 3;
                $reason = '';
                // 查询业主电话,姓名,房号,楼层
                $tel = $v->house->owner_info[0]['tel'];
                $name = $v->house->owner_info[0]['name'];
                $identifier = SaasHouse::whereRaw("JSON_CONTAINS(owner_info->'$[*].tel', '\"$tel\"', '$')")
                                        ->whereRaw("JSON_CONTAINS(owner_info->'$[*].name', '\"$name\"', '$')")
                                        ->where([
                                            'house_number' => $v->house->house_number,
                                            'floor' => $v->house->floor
                                        ])->value('house_identifier');
            } elseif ($v->customer) {
                // 有效  客源编号
                $status = 3;
                $reason = '';
                $tel = $v->customer->tel;
                $name = $v->customer->name;
                $price_low = $v->customer->price_low;
                $price_high = $v->customer->price_high;
                $identifier = SaasCustomer::whereRaw("JSON_CONTAINS(customer_info->'$[*].tel', '\"$tel\"', '$')")
                                            ->whereRaw("JSON_CONTAINS(customer_info->'$[*].name', '\"$name\"', '$')")
                                            ->where([
                                                'min_price' => $price_low,
                                                'max_price' => $price_high
                                            ])->value('customer_identifier');
            } else {
                // 有效  处理中
                $status = 2;
                $reason = '';
                $identifier = '';
            }

            // 管理层guid
            if ($v->manage) {
                $manage_guid = Agent::where('tel', $v->manage->tel)->value('guid');
            } else {
                $manage_guid = '';
            }

            // 经纪人guid
            if ($v->staff) {
                $handle_guid = Agent::where('tel', $v->staff->tel)->value('guid');
            } else {
                $handle_guid = '';
            }

            if (!$handle_guid || !$manage_guid) {
                $status = 4 ;
                $reason = '无效工单' ;
                $identifier = '' ;
            }
            $work_order = WorkOrder::create([
                'guid' => Common::getUuid(),
                'gd_identifier' => $gd_identifier,
                'identifier' => $identifier,
                'name' => $v->name,
                'tel' => $v->tel,
                'source' => $v->source,
                'page_source' => $page_source,
                'demand' => $v->demand,
                'area_name' => $record->area_name??'',
                'building_name' => $record->building_name??'',
                'acreage' => $record ? $record->acreage : $v->acreage ? $v->acreage : '',
                'issue' => $v->created_at->format('Y-m-d H:i:s'),
                'manage_guid' => $manage_guid,
                'manage_deal' => date('Y-m-d H:i:s', $v->shopkeeper_deal),
                'handle_guid' => $handle_guid,
                'handle_deal' => date('Y-m-d H:i:s', $v->staff_deal),
                'status' => $status,
                'reason' => $reason,
                'remark' => $v->remark,
                'recorder' => $v->recorder,
                'created_at' => $v->created_at->format('Y-m-d H:i:s')
            ]);

            // 新建工单参与记录
            if (!empty($manage_guid)) {
                Partake::create([
                    'guid' => Common::getUuid(),
                    'work_order_guid' => $work_order->guid,
                    'user_guid' => $manage_guid
                ]);
            }

            if (!empty($handle_guid)) {
                Partake::create([
                    'guid' => Common::getUuid(),
                    'work_order_guid' => $work_order->guid,
                    'user_guid' => $handle_guid
                ]);
            }

            if ($v->demand == 1) {
                $demand = '房源编号';
            } elseif ($v->demand == 2) {
                $demand = '客源编号';
            }

            // 添加工单进度
            $repo = new WorkOrdersRepository();
            // 客服收到工单
            $str = '客服接收工单';
            Common::addSchedule($work_order->guid, $str);
            sleep(1);

            // 客服分配
            if ($v->shopkeeper_id && $manage_guid) {
                $user = $repo->getUser($manage_guid);
                $str = '客服'.$v->recorder.'将工单分配给'.$user;
                Common::addSchedule($work_order->guid, $str);
                sleep(1);
            }

            // 管理层分配
            if ($v->shopkeeper_deal && $handle_guid) {
                $str = '工单分配给'.$repo->getUser($handle_guid);
                Common::addSchedule($work_order->guid, $str);
                sleep(1);
            }

            // 经纪人确定
            if ($v->staff_deal && $handle_guid) {
                $str = '确定收到工单'.$repo->getUser($handle_guid);
                Common::addSchedule($work_order->guid, $str);
                sleep(1);
            }

            // 跟进
            if ($v->feedback && $handle_guid && $v->valid != 2) {
                $str = $v->feedback.$repo->getUser($handle_guid);
                Common::addSchedule($work_order->guid, $str);
                sleep(1);
            }

            // 操作 (有效)
            if ($identifier && $handle_guid) {
                $str = '工单结束:'.$demand.$identifier.$repo->getUser($handle_guid);
                Common::addSchedule($work_order->guid, $str);
            }

            // 反馈无效的工单
            if ($v->valid == 2 && $handle_guid) {
                $str = '工单结束:'.$v->feedback.$repo->getUser($handle_guid);
                Common::addSchedule($work_order->guid, $str);
            }

            // 未分配的工单
            if (!$handle_guid || !$manage_guid) {
                $str = '工单结束: 工单未分配,无效工单';
                Common::addSchedule($work_order->guid, $str);
            }
        }
    }
}
