<?php

namespace App\Console\Commands;

use App\Models\Building;
use App\Models\BuildingBlock;
use App\Models\Houses;
use Illuminate\Console\Command;

class delHouse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delHouse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '删除楼栋或楼盘归属的房源';

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
        $house = Houses::all();
        foreach ($house as $v) {
            $block = BuildingBlock::where(['guid' => $v->building_block_guid, 'deleted_at' => null])->first();
            $building = Building::where(['guid' => $v->building_guid, 'deleted_at' => null])->first();
            if (empty($building) || empty($block)) {
                $v->delete();
            }
        }
    }
}
