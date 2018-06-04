<?php

namespace App\Services;



class HomePagesService
{
    /**
     * 说明: 获取对应的时间日期
     *
     * @param $time
     * @return mixed
     * @author 刘坤涛
     */
    public function getTime($time)
    {
        $year = date('Y'); //当前年份
        $month = date('m');//当前月份
        $day = date('d');  //当前日期
        switch ($time) {
            case 1:
                //计算今天0:0:0 和 23:59:59秒的时间戳
                $start = mktime(0, 0, 0, $month, $day, $year);
                $end = mktime(23, 59, 59, $month, $day, $year);
                break;
            case 2:
                //计算本周星期一0:0:0 和 星期天23:59:59秒的时间戳
                $start = strtotime('Sunday -6 day',strtotime($year.'-'.$month.'-'.$day));
                $end = strtotime('Monday 7 day',strtotime($year.'-'.$month.'-'.$day)) - 1;
                break;
            case 3:
                //计算本月1号 0:0:0 和本月最后一天23:59:59秒的时间戳
                $start = mktime(0,0,0,$month,1,$year);
                $end = mktime(23,59,59,$month,date('t'), $year);
                break;
            case 4:
                //如果是上半年
                //计算1月1号 0:0:0 和6月30号23:59:59的时间戳
                if ($month <= 6) {
                    $start = mktime(0,0,0,1,1,$year);
                    $end = mktime(23,59,59,6,30,$year);
                } else {
                    //如果是下半年
                    //计算7月1号 和12月31号23:59:59秒的时间戳
                    $start = mktime(0,0,0,7,1,$year);
                    $end = mktime(23,59,59,12,31,$year);
                }
                break;
                default;
                break;
        }
        $date['start'] = date('Y-m-d H:i:s', $start);
        $date['end'] = date('Y-m-d H:i:s', $end);
        return $date;
    }

    /**
     * 说明: 获取逾期时间(天,小时)
     *
     * @param $time
     * @author 刘坤涛
     */
    public function time($second)
    {
        $timestamps = $second / (24*3600);
        if ($timestamps > 1) {
            $day = (int)substr($timestamps,0,1);
            $hour = floatval($timestamps - $day) * 24;
            $time = $day . '天' . $hour . '小时';
        } else {
            $time = (int)$timestamps * 24 . '小时';
        }
        return $time;
    }

    public function getInfo($house)
    {
        $time = 24*3600;

        $data = [];
        foreach($house as $k => $v) {
            $data[$k]['house_id'] = $v->id;
            $data[$k]['name'] = $v->buildingBlock->building->name. ' '. $v->buildingBlock->name .$v->buildingBlock->name_unit.$v->house_number.'室';
            $data[$k]['time'] = $this->time($v->end_track_time - time());
        }
        return $data;
    }
    
}