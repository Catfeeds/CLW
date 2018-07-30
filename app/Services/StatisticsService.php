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
        $arr = explode('-', $string);
        $date = $this->getAppointDate($arr[0], $arr[1]);
        return $date;
    }

    //获取数据统计数据
    public function getData($time, $source = null, $type = null)
    {
        $res = EntrustThrowIn::whereBetween('created_at', $time);
        if (!empty($source)) $res = $res->where('source', $source);
        if (!empty($type)) {
            if (is_array($type)) {
                $res = $res->whereIn('demand', $type);
            } else {
                $res = $res->where('demand', $type);
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
    public function statistic($time)
    {
//        1:APP,2:PC,3:微信,4:小程序,5:官网客服,6:百度信息流,7:今日头条信息流,8:58同城,9:400电话
        //1=>投放房源,2=>委托找房,3=>企业服务,4=>其他
        //全部渠道统计数据
        $data = [];
        $data[] = $this->getAllData($time);
        $data[0] = array_merge(['label_name' => '全部'], $data[0]);
        //投放房源
        $data[] = $this->getTypeData($time,1);
        $data[1] = array_merge(['label_name' => '投放房源'], $data[1]);
        //委托找房
        $data[] = $this->getTypeData($time, 2);
        $data[2] = array_merge(['label_name' => '委托找房'], $data[2]);
        //企业服务 总计数量
        $data[]['tel'] = $this->getData($time, null, 3);
        $data[3] = array_merge(['label_name' => '企业服务'], $data[3]);
        //其他 tel
        $data[]['tel'] = $this->getData($time, null, 4);
        $data[4] = array_merge(['label_name' => '其他'], $data[4]);
        return $data;
    }

    //渠道来源构成数据
    public function constituteData($request)
    {
        $date = $this->getDateByParam($request->time);
        $res = $this->getAllData($date);
        $data = [];
        $data[0]['title'] = '400电话';
        $data[0]['value'] = $res['tel'];
        $data[1]['title'] = '官网客服';
        $data[1]['value'] = $res['web'];
        $data[2]['title'] = '百度信息流';
        $data[2]['value'] = $res['baidu'];
        $data[3]['title'] = '今日头条信息流';
        $data[3]['value'] = $res['toutiao'];
        $data[4]['title'] = 'APP';
        $data[4]['value'] = $res['app'];
        $data[5]['title'] = 'PC';
        $data[5]['value'] = $res['pc'];
        $data[6]['title'] = '微信';
        $data[6]['value'] = $res['wechat'];
        $data[7]['title'] = '小程序';
        $data[7]['value'] = $res['mini'];
        $data[8]['title'] = '58同城';
        $data[8]['value'] = $res['tongcheng'];
        return $data;
    }

    public function getRawCount($time, $param = null, $demand = null, $source = null)
    {
        $res = RawCustom::whereBetween('created_at', $time);
        if (!empty($param)) $res = $res->where($param, 1);
        if (!empty($demand)) $res = $res->whereIn('demand', $demand);
        if (!empty($source)) $res = $res->whereIn('source', $source);
        return $res->count();
    }
    

    //漏斗转化率
    public function conversionRate($request)
    {
        $date = $this->getDateByParam($request->time);
        $data = [];
        $demand = [1, 2];
        //渠道总数量(全部渠道中的委托 + 工单中电话和客服的委托)
        $count = $this->getData($date, null, $demand) + $this->getRawCount($date, null, $demand, $demand);
        if (!$count) return $data;
        //有效
        $count1 = $this->getRawCount($date, 'valid', $demand, null);

        //成交clinch
        $count2 = $this->getRawCount($date, 'clinch', $demand, null);

        //有效/渠道
        $percent1 = round($count1 / $count ,3) *100 . '%';

        //成交/有效
        $percent2 = round($count2 /$count1 ,3) *100 .'%';

        //成交/渠道
        $percent3 = round($count2 / $count ,3) *100 . '%';

        $arr = [];
        $arr['percent1'] = $percent1;
        $arr['percent2'] = $percent2;
        $arr['percent3'] = $percent3;
        $data['arr'][0]['title'] = '渠道';
        $data['arr'][0]['value'] = $count;
        $data['arr'][1]['title'] = '有效';
        $data['arr'][1]['value'] = $count1;
        $data['arr'][2]['title'] = '成交';
        $data['arr'][2]['value'] = $count2;
        $data['percent'] = $arr;
        return $data;
    }

}