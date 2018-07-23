<?php

namespace App\Services;



use App\Models\EntrustThrowIn;

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
            $tiem = $this->getTime($request->time, $request->end);
        }
        //全部渠道统计数据

    }


    
}