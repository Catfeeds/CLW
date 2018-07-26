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
    
    //根据年月获取指定月份时间格式
    public function getAppointDate($year, $month)
    {
        $start = mktime(0,0,0, $month,1, $year);
        $end = mktime(23,59,59, $month, date('t',strtotime($year. '-' . $month)), $year);
        return $this->getDate($start, $end);
    }

    //根据参数获取日期
    public function getDateByParam($string)
    {
        if (substr_count($string, '-')) {
            $arr = explode('-', $string);
            $date = $this->getAppointDate($arr[0], $arr[1]);
        } else {
            if ($string == 1) {
                $date = $this->getMonthTime();
            } else {
                $date = $this->getLastMonthTime();
            }
        }
        return $date;
    }

    //获取数据统计数据
    public function getData($time, $source = null, $type = null)
    {
        $res = EntrustThrowIn::whereBetween('created_at', $time);
        if (!empty($source)) $res = $res->where('source', $source);
        if (!empty($type)) {
            if (is_array($type)) {
                $res = $res->whereIn('type', $type);
            } else {
                $res = $res->where('type', $type);
            }
        }
        $count = $res->count();
        return $count;
    }


    //全部渠道的投放、委托数据
    public function getAllData($time)
    {
        $data = [];
        $type = [1, 2];
        $data['tel'] = $this->getData($time,1, $type);
        $data['web'] = $this->getData($time, 2, $type);
        $data['baidu'] = $this->getData($time, 3, $type);
        $data['toutiao'] = $this->getData($time, 4, $type);
        $data['app'] = $this->getData($time, 5, $type);
        $data['pc'] = $this->getData($time, 6, $type);
        $data['wechat'] = $this->getData($time, 7, $type);
        $data['mini'] = $this->getData($time, 8, $type);
        $data['tongcheng'] = $this->getData($time, 9, $type);
        return $data;
    }

    //获取不同渠道数据
    public function getTypeData($time, $type)
    {
        $data = [];
        $data['tel'] = $this->getData($time, 1, $type);
        $data['web'] = $this->getData($time, 2, $type);
        $data['baidu'] = $this->getData($time, 3, $type);
        $data['toutiao'] = $this->getData($time, 4, $type);
        $data['app'] = $this->getData($time, 5, $type);
        $data['pc'] = $this->getData($time, 6, $type);
        $data['wechat'] = $this->getData($time, 7, $type);
        $data['mini'] = $this->getData($time, 8, $type);
        $data['tongcheng'] = $this->getData($time, 9, $type);
        return $data;
    }

    //线上客户来源数据
    public function statistic($request)
    {
//        1:APP,2:PC,3:微信,4:小程序,5:官网客服,6:百度信息流,7:今日头条信息流,8:58同城,9:400电话
        //1=>投放房源,2=>委托找房,3=>企业服务,4=>其他
        //全部渠道统计数据
        $data = [];
        $data['all'] = $this->getAllData($request->time);
        //投放房源
       $data['throw'] = $this->getTypeData($request->time,1);
        //委托找房
        $data['entrust'] = $this->getTypeData($request->time, 2);
        //企业服务
        $data['service'] = $this->getData($request->time, null, 3);
        //其他
        $data['other'] = $this->getData($request->time, null, 4);
        return $data;
    }

    //渠道来源构成数据
    public function constituteData($request)
    {
        $date = $this->getDateByParam($request->time);
        $data = $this->getAllData($date);
        $count = 0;
        foreach ($data as $v) {
            $count += $v;
        }
        if (!$count) return;
        $data['app'] = round($data['app'] / $count, 3) * 100 . '%';
        $data['pc'] = round($data['pc'] / $count, 3) * 100 . '%';
        $data['wechat'] = round($data['wechat'] / $count, 3) * 100 . '%';
        $data['mini'] = round($data['mini'] / $count, 3) * 100 . '%';
        $data['web'] = round($data['web'] / $count, 3) * 100 . '%';
        $data['baidu'] = round($data['baidu'] / $count, 3) * 100 . '%';
        $data['toutiao'] = round($data['toutiao'] / $count, 3) * 100 . '%';
        $data['tongcheng'] = round($data['tongcheng'] / $count, 3) * 100 . '%';
        $data['tel'] = round($data['tel'] / $count, 3) * 100 . '%';
        return $data;
    }

    //漏斗转化率
    public function conversionRate($request)
    {
        $date = $this->getDateByParam($request->time);
        //渠道总数量
        $data = [];
        $count1 = EntrustThrowIn::whereIn('type',[1,2])->whereBetween('created_at',$date)->count();
        $count2 = RawCustom::whereIn('source',[1,2])->whereBetween('created_at',$date)->count();
        $count = $count1 + $count2;
        $data['canal'] = $count;
        //工单列表中有效状态中状态为有效的数量
        $count3 = RawCustom::where('valid',1)->whereBetween('created_at',$date)->count();
        $data['valid'] = $count3;
        //工单列表中是否成交状态的成交的数量
        $count4 = RawCustom::where('clinch',1)->whereBetween('created_at',$date)->count();
        $data['clinch'] = $count4;
        //渠道有效转化率
        $data['canal_valid']= round($count3 / $count ,3) *100 . '%';
        //成交转化率
        $data['valid_clinch'] = round($count4 /$count3 ,3) *100 .'%';
        //渠道成交转化率
        $data['canal_clinch'] = round($count4 / $count ,3) *100 . '%';
        return $data;
    }

}