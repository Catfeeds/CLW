<?php

namespace App\Console\Commands;

use App\Models\Custom;
use App\Models\OfficeBuildingHouse;
use App\Models\Statistic;
use Illuminate\Console\Command;

class StatisticsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'statisticsData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '统计房源、客源数量到统计表';

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
        self::statisticsData();
    }

    /**
     * 说明: 统计客源、房源每天的数量,插入到统计表
     *
     * @author 刘坤涛
     */
    public function statisticsData()
    {
        $res= Custom::all();
        foreach($res as $v) {
            $v->time = $v->created_at->format('Y-m-d');
        }

        //58客源
        $item = $res->where('source',6)->groupBy('time')->toArray();
        foreach ($item as $k => $v) {
            $arr[$k][0] = count($v);
        }

        //安居客客源
        $item = $res->where('source',5)->groupBy('time')->toArray();
//        dd($item);
        foreach ($item as $key => $value) {
            if (!isset($arr[$key])) {
                $arr[$key][0] = 0;
            }
            foreach ($arr as $k => $v) {
                if (!isset($item[$k])) {
                    $arr[$k][1] = 0;
                }
            }
            $arr[$key][1] = count($value);
        }
        //赶集客源
        $item = $res->where('source',4)->groupBy('time')->toArray();
        foreach ($item as $key => $value) {
            if (!isset($arr[$key])) {
                $arr[$key][0] = 0;
                $arr[$key][1] = 0;
            }
            foreach ($arr as $k => $v) {
                if (!isset($item[$k])) {
                    $arr[$k][2] = 0;
                }
            }
            $arr[$key][2] = count($value);
        }


        $record = OfficeBuildingHouse::all();
        foreach($record as $v) {
            $v->time = $v->created_at->format('Y-m-d');
        }
        //赶集房源
        $item = $record->where('source',4)->groupBy('time')->toArray();
        foreach ($item as $key => $value) {
            if (!isset($arr[$key])) {
                $arr[$key][0] = 0;
                $arr[$key][1] = 0;
                $arr[$key][2] = 0;
            }
            foreach ($arr as $k => $v) {
                if (!isset($item[$k])) {
                    $arr[$k][3] = 0;
                }
            }
            $arr[$key][3] = count($value);
        }


        //安居客房源
        $item = $record->where('source',5)->groupBy('time')->toArray();
        foreach ($item as $key => $value) {
            if (!isset($arr[$key])) {
                $arr[$key][0] = 0;
                $arr[$key][1] = 0;
                $arr[$key][2] = 0;
                $arr[$key][3] = 0;
            }
            foreach ($arr as $k => $v) {
                if (!isset($item[$k])) {
                    $arr[$k][4] = 0;
                }
            }
            $arr[$key][4] = count($value);
        }


        //58房源
        $item = $record->where('source',6)->groupBy('time')->toArray();
        foreach ($item as $key => $value) {
            if (!isset($arr[$key])) {
                $arr[$key][0] = 0;
                $arr[$key][1] = 0;
                $arr[$key][2] = 0;
                $arr[$key][3] = 0;
                $arr[$key][4] = 0;
            }
            foreach ($arr as $k => $v) {
                if (!isset($item[$k])) {
                    $arr[$k][5] = 0;
                }
            }
            $arr[$key][5] = count($value);
        }
        //将数组按日期排序
        ksort($arr);
        //在将数据循环插入到数据表
        foreach ($arr as $k => $v) {
            $result = Statistic::create([
                'source_58_custom' => $v[0],
                'source_ajk_custom' => $v[1],
                'source_gj_custom' => $v[2],
                'source_58_house' => $v[5],
                'source_ajk_house' => $v[4],
                'source_gj_house' => $v[3],
                'count' => $v[0] + $v[1] + $v[2] + $v[3] + $v[4] + $v[5],
                'created_at' => $k
            ]);
            if (empty($result)) \Log::info('添加失败');
        }

    }
}
