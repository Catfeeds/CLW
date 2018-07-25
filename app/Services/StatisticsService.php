<?php

namespace App\Services;



use App\Models\EntrustThrowIn;
use App\Models\RawCustom;

class StatisticsService
{
    private $year;
    private $month;
    private $day;

    public function __construct()
    {
        $this->year =  date('Y');//当前年份
        $this->month = date('m');//当前月份
        $this->day = date('d');  //当前日期
    }

    //将时间戳转换为日期格式
    public function getDate($start, $end)
    {
        $date['start'] = date('Y-m-d H:i:s', $start);
        $date['end'] = date('Y-m-d H:i:s', $end);
        return $date;
    }

    //获取时间
    public function getTime($distance = 0, $end = 0)
    {
        $start = mktime(0, 0, 0, $this->month, $this->day - $distance, $this->year);
        $end = mktime(23, 59, 59, $this->month, $this->day - $end, $this->year);
        return $this->getDate($start, $end);
    }

    //获取上月时间
    public function getLastMonthTime()
    {
        $start = mktime(0,0,0,$this->month-1,1, $this->year);
        $end = mktime(23,59,59,$this->month-1, date("t",$start),date("Y",$start));
        return $this->getDate($start, $end);
    }

    //获取本月时间
    public function getMonthTime()
    {
        $start = mktime(0,0,0, $this->month,1, $this->year);
        $end = mktime(23,59,59, $this->month, date('t'), $this->year);
        return $this->getDate($start, $end);
    }

    public function statistic($request)
    {
        //获取查询时间
        if (is_array($request->time)) {
            $time = $request->time;
        } else {
            $time = $this->getTime($request->time, $request->end);
        }
        //全部渠道统计数据
        $data = [];
        $data['all'][0] = $this->getData($time, 5);
        $data['all'][1] = $this->getData($time, 6);
        $data['all'][2] = $this->getData($time, 7);
        $data['all'][3] = $this->getData($time, 1);
        $data['all'][4] = $this->getData($time, 2);
        $data['all'][5] = $this->getData($time, 3);
        $data['all'][6] = $this->getData($time, 4);
        //投放房源
        $data['throw'][0] = $this->getData($time, 5, 2);
        $data['throw'][1] = $this->getData($time, 6, 2);
        $data['throw'][2] = $this->getData($time, 7, 2);
        $data['throw'][3] = $this->getData($time, 1, 2);
        $data['throw'][4] = $this->getData($time, 2, 2);
        $data['throw'][5] = $this->getData($time, 3, 2);
        $data['throw'][6] = $this->getData($time, 4, 2);
        //委托找房
        $data['entrust'][0] = $this->getData($time, 5, 1);
        $data['entrust'][1] = $this->getData($time, 6, 1);
        $data['entrust'][2] = $this->getData($time, 7, 1);
        $data['entrust'][3] = $this->getData($time, 1, 1);
        $data['entrust'][4] = $this->getData($time, 2, 1);
        $data['entrust'][5] = $this->getData($time, 3, 1);
        $data['entrust'][6] = $this->getData($time, 4, 1);
        //企业服务
        $data['service'] = EntrustThrowIn::whereBetween('created_at', $time)->where('type', 3)->count();
        //其他
        $data['other'] = EntrustThrowIn::whereBetween('created_at', $time)->where('type', 4)->count();
        //转化率
        $count1 = EntrustThrowIn::whereIn('type', [1, 2])->whereBetween('created_at', $time)->count();

        return $data;
    }


    public function getData($time, $source, $type = null)
    {
        if ($type) {
            $count = EntrustThrowIn::whereBetween('created_at', $time)->where(['source' => $source, 'type' => $type])->count();
        } else {
            $count =  EntrustThrowIn::whereBetween('created_at', $time)->where('source', $source)->count();
        }
        return $count;
    }

    //漏斗转化率
    public function conversionRate()
    {
        //渠道总数量
        $count1 = EntrustThrowIn::whereIn('type',[1,2])->count();
        $count2 = RawCustom::whereIn('source',[1,2])->count();
        $count = $count1 + $count2;
        //工单列表中有效状态中状态为有效的数量
        $count3 = RawCustom::where('volid',1)->count();
        //工单列表中是否成交状态的成交的数量
        $count4 = RawCustom::where('clinch',1)->count();
        //渠道有效转化率
        $ecroc = round($count3 / $count ,3) *100 . '%';
        //成交转化率
        $turnover_rate = round($count4 /$count3 ,3) *100 .'%';
        //渠道成交转化率
        $croct = round($count4 / $count ,3) *100 . '%';
    }

}