<?php

namespace App\Console\Commands;

use App\Handler\Common;
use App\Models\EntrustThrowIn;
use App\Models\RawCustom;
use App\Models\WorkOrder;
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
        $raw = RawCustom::all();
        foreach ($raw as $v) {
            $last = WorkOrder::orderBy('created_at', 'asc')->get()->last();
            $identifier = Common::identifier($last);
            // 来源区域
            $record = EntrustThrowIn::where('status', $v->identifier)->first();
            if (empty($record->page_source)) {
                $page_source = '管理系统';
            }
            $work_order = WorkOrder::create([
                'guid' => Common::getUuid(),
                'gd_identifier' => $identifier,
                'identifier' => '',
                'name' => $v->name,
                'tel' => $v->tel,
                'source' => $v->source,
                'page_source' => $page_source,
                'demand' => $v->demand,
                'area_name' => $record->area_name??'',
                'building_name' => $record->building_name??'',
                'acreage' => $record->acreage ? $record->acreage : $v->acreage ? $v->acreage: '',
                ''
            ]);
        }

    }
}
