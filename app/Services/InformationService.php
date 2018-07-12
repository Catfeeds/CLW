<?php

namespace App\Services;

use App\Handler\Common;
use App\Models\Information;
use Illuminate\Support\Facades\Storage;

class InformationService
{
    public function pickInformation($request)
    {
        $page = $request->page;

        $count = 0;
        for ($i = 0; $i < $page; $i++) {
            $data = curl('https://wh.news.anjuke.com/toutiao/ajax/toutiaoajax/?page=' . ($page + 1) . '&type=1','GET');

            if (empty($data) || empty($data->list)) {
                if ($i == 0) {
                    \Log::error('接口异常');
                    return [
                        'status' =>false,
                        'message' => '接口异常,请联系开发人员!'
                    ];
                } else {
                    \Log::info('爬取完毕，一共爬取' . $page*2 . '条记录');
                }
            }

            foreach ($data->list as $item) {
                $temp = [];
                $temp['source'] = !empty($item->author) ? $item->author : '安居客';
                $temp['title'] = $item->title;
                $temp['brief'] = $item->summary;
                if (!empty($item->image_url)) {
                    $imgName = time().rand(10,9999999999);
                    $res = file_get_contents($item->image_url);
                    Storage::put('public/' . $imgName . '.jpg', $res);

                    $keyNew = 'informationImg/' . $imgName . '.jpg';
                    $res = Common::QiniuUpload(storage_path() . '/app/public/' . $imgName . '.jpg', $keyNew);

                    // 上传成功删除
                    if ($res['status'] == false) {
                        \Log::info($imgName . '.jpg'. '上传失败');
                    } else {
                        // 图片数据
                        $temp['banner'] = $keyNew;
                        unlink(storage_path() . '/app/public/' . $imgName . '.jpg');
                    }

                } else {
                    continue;
                }

                $res = curl($item->m_url,'get');
                $string = strstr($res, '<div class="cont_info">');
                $rea = explode('      </div>
      <!-- 楼盘名片入口 -->', $string);
                $temp['content'] = $rea[0];
                $count++;
                if (!Information::create($temp)->wasRecentlyCreated) {
                    \Log::error('添加数据库出错了');
                    return [
                        'status' => false,
                        'message' => '扒取的资讯数据添加失败!'
                    ];
                }
            }
        }
        @array_map('unlink', glob(storage_path() . '/app/public/*'));
        return [
            'status' => true,
            'message' => '爬取完毕，一共爬取' . $page*20 . '条记录'
        ];
    }
}