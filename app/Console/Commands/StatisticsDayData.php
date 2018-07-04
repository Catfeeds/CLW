<?php

namespace App\Console\Commands;

use App\Models\Custom;
use App\Models\OfficeBuildingHouse;
use App\Models\Statistic;
use Illuminate\Console\Command;

class StatisticsDayData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statisticsDayData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '统计昨天的客源、房源数量到统计表';

    /**
     * AddManager constructor.
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
        // 插入数据
        self::statisticsDayData();
    }

    /**
     * 说明: 统计客源表每天的数量,插入到统计表
     *
     * @author 罗振
     */
    public function statisticsDayData()
    {
        //获取昨天的时间格式 0点到23点59分59秒
        $start=mktime(0,0,0,date('m'),date('d')-1,date('Y'));
        $end=mktime(23,59,59,date('m'),date('d')-1,date('Y'));
        $date['start'] = date('Y-m-d H:i:s', $start);
        $date['end'] = date('Y-m-d H:i:s', $end);
        if (!empty(Statistic::whereBetween('created_at', $date)->get())) {
            $this->error('请勿重复添加');
            return;
        }



        //查询昨天的客源数据
        //赶集客源
        $arr[] = Custom::whereBetween('created_at', $date)->where('source', 4)->count();
        //安居客客源
        $arr[] = Custom::whereBetween('created_at', $date)->where('source', 5)->count();
        //58同城客源
        $arr[] = Custom::whereBetween('created_at', $date)->where('source', 6)->count();
        //查询昨天房源数据
        //赶集房源
        $arr[] = OfficeBuildingHouse::whereBetween('created_at', $date)->where('source', 4)->count();
        //安居客房源
        $arr[] = OfficeBuildingHouse::whereBetween('created_at', $date)->where('source', 5)->count();
        //58房源
        $arr[] = OfficeBuildingHouse::whereBetween('created_at', $date)->where('source', 6)->count();

        $res = Statistic::create([
            'source_58_custom' => $arr[2],
            'source_ajk_custom' => $arr[1],
            'source_gj_custom' => $arr[0],
            'source_58_house' => $arr[5],
            'source_ajk_house' => $arr[4],
            'source_gj_house' => $arr[3],
            'created_at' => $date['start'],
            'count' => $arr[0] + $arr[1] + $arr[2] + $arr[3] + $arr[4] + $arr[5]
        ]);
        if (empty($res)) \Log::info('添加失败');

    }
}
