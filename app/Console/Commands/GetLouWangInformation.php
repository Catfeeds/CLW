<?php

namespace App\Console\Commands;

use App\Models\Information;
use App\Models\LouWangInformation;
use Illuminate\Console\Command;

class GetLouWangInformation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getLouWangInformation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '获取楼王的资讯填充到管理后台';

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
        self::getLouWangInformation();
    }

    /**
     * 说明: 获取楼王的资讯填充到管理后台
     *
     * @author 罗振
     */
    public function getLouWangInformation()
    {
        $informations = LouWangInformation::where(['status' => 1])->get();

        foreach ($informations as $v) {
            $res = Information::create([
                'banner' => $v->banner,
                'source' => $v->source,
                'title' => $v->title,
                'brief' => $v->brief,
                'content' => $v->content,
                'created_at' => $v->created_at,
                'updated_at' => $v->updated_at
            ]);
            if (empty($res)) \Log::info($v->guid.'的资讯添加失败');
        }


    }
}
