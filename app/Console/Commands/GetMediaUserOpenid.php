<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\User;
use Illuminate\Console\Command;

class GetMediaUserOpenid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'getMediaUserOpenid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '将CLW数据库的employees表中的openid加到media数据库users表中';

    /**
     * Create a new command instance.
     *
     * @return void
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
        // 查询出employees中的所有tel,openid
        $data = Employee::pluck('tel', 'openid')->get()->toArray();
        foreach ($data as $k=>$v) {
            $res = User::where('tel', $k)->first();
            if(!empty($res)) {
                User::where('tel',$k)->update(['openid'=>$v]);
            }
            return $res;
        }
    }
}
