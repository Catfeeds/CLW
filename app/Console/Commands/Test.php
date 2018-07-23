<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Test extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '测试';

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
        self::test();
    }

    /**
     * 说明: 获取楼王的资讯填充到管理后台
     *
     * @author 罗振
     */
    public function test()
    {
        $data = curl('https://sysapi.jacklin.club/api/app/buildings','GET');
        dd($data->data->data[0]->pc_house[0]->payment_type);

    }
}
