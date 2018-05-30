<?php
namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\API\APIBaseController;
use Illuminate\Http\Request;

class BespeakStaController extends APIBaseController
{

    public function index(
        Request $request
    )
    {
        dd($this->cut_up_time_part(time(), time()-7*60*60*24));

    }

    public function cut_up_time_part($start, $end="", $nums = 10, $format=true) {
        $start = strtotime($start);
        $end   = strtotime($end);
        $parts = ($end - $start)/$nums;
        $last  = ($end - $start)%$nums;
        if ( $last > 0) {
            $parts = ($end - $start - $last)/$nums;
        }
        for ($i=1; $i <= $nums; $i++) {
            $_end  = $start + $parts * $i;
            $arr[] = array($start + $parts * ($i-1), $_end);
        }
        $len = count($arr)-1;
        $arr[$len][1] = $arr[$len][1] + $last;
        if ($format) {
            foreach ($arr as $key => $value) {
                $arr[$key][0] = date("Y-m-d H:i:s", $value[0]);
                $arr[$key][1] = date("Y-m-d H:i:s", $value[1]);
            }
        }
        return $arr;
    }

    // 处理时间
    public function timeProcessing(
        $time
    )
    {
        if ($time == 7) {
            // 7



            // 30

            // 90
        }



    }
    
    


}