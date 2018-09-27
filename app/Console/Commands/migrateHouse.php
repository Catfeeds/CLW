<?php

namespace App\Console\Commands;

use App\Handler\Common;
use App\Models\BuildingBlock;
use App\Models\Houses;
use App\Models\OfficeBuildingHouse;
use Illuminate\Console\Command;

class migrateHouse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrateHouse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '迁移中介房子表';

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
        $house = OfficeBuildingHouse::all();

        foreach ($house as $v) {

            $guid = BuildingBlock::where('id', $v->building_block_id)->value('guid');

            $res = Houses::create([
                'guid' => Common::getUuid(),
                'id' => $v->id,
                'house_identifier' => $v->house_identifier,
                'gd_identifier' => $v->gd_identifier,
                'building_block_id' => $v->building_block_id,
                'building_block_guid' => $guid,
                'house_number' => $v->house_number,
                'title' => $v->title,
                'owner_info' => $v->owner_info,
                'room' => $v->room,
                'hall' => $v->hall,
                'constru_acreage' => $v->constru_acreage,
                'split' => $v->split,
                'min_acreage' => $v->min_acreage,
                'floor' => $v->floor,
                'station_number' => $v->station_number,
                'office_building_type' => $v->office_building_type,
                'register_company' => $v->register_company,
                'open_bill' => $v->open_bill,
                'renovation' => $v->renovation,
                'orientation' => $v->orientation,
                'support_facilities' => $v->support_facilities,
                'house_description' => $v->house_description,
                'unit_price' => $v->unit_price,
                'total_price' => $v->total_price,
                'payment_type' => $v->payment_type,
                'check_in_time' => $v->check_in_time,
                'shortest_lease' => $v->shortest_lease,
                'rent_free' => $v->rent_free,
                'increasing_situation' => $v->increasing_situation,
                'increasing_situation_remark' => $v->increasing_situation_remark,
                'cost_detail' => $v->cost_detail,
                'house_busine_state' => $v->house_busine_state,
                'pay_commission' => $v->pay_commission,
                'pay_commission_unit' => $v->pay_commission_unit,
                'prospecting' => $v->prospecting,
                'source' => $v->source,
                'house_key' => $v->house_key,
                'see_house_time' => $v->see_house_time,
                'see_house_time_remark' => $v->see_house_time_remark,
                'certificate_type' => $v->certificate_type,
                'house_proxy_type' => $v->house_proxy_type,
                'guardian' => $v->guardian,
                'house_type_img' => $v->house_type_img,
                'indoor_img' => $v->indoor_img,
                'shelf' => $v->shelf,
                'start_track_time' => $v->start_track_time,
                'end_track_time' => $v->end_track_time,
                'rent_time' => $v->rent_time,
                'remarks' => $v->remarks,
            ]);
            if (!$res) \Log::info($v->id.'迁移失败');
        }

    }
}
