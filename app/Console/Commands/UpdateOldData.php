<?php

namespace App\Console\Commands;

use App\Models\Block;
use App\Models\Building;
use App\Models\BuildingHasFeature;
use App\Models\BuildingLabel;
use App\Models\BuildingRecommend;
use App\Models\HotBlock;
use App\Models\MediaBlock;
use App\Models\PcRecommend;
use App\Models\Recommend;
use App\Models\RelBlock;
use Illuminate\Console\Command;

class UpdateOldData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'updateOldData';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '修改基础老数据关联';

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
        self::updateOldData();
    }

    // 修改基础老数据关联
    public function updateOldData()
    {
        // 楼盘特色
        $buildingHasFeature = BuildingHasFeature::with('oldBuilding')->get();
        foreach ($buildingHasFeature as $v) {
            $v->building_guid = $v->oldBuilding->guid;
            if (!$v->save()) \Log::error('id为:'.$v->id.'的楼盘特色关联修改失败');
        }

        // 楼盘标签
        $buildingLabel = BuildingLabel::with('oldBuilding')->get();
        foreach ($buildingLabel as $v) {
            if ($v->building_id) {
                $v->building_guid = $v->oldBuilding->guid;
                if (!$v->save()) \Log::error('id为:'.$v->id.'的楼盘标签关联修改失败');
            }
        }

        // 推荐楼盘
        $buildingRecommend = BuildingRecommend::with('oldBuilding')->get();
        foreach ($buildingRecommend as $v) {
            $v->building_guid = $v->oldBuilding->guid;
            if (!$v->save()) \Log::error('id为:'.$v->id.'的楼盘推荐关联修改失败');
        }

        // 热门商圈
        $hotBlock = HotBlock::with('oldBlock')->get();
        foreach ($hotBlock as $v) {
            $v->block_guid = $v->oldBlock->guid;
            if (!$v->save()) \Log::error('id为:'.$v->id.'的热门商圈修改失败');
        }

        // pc端精品推荐
        $pcRecommend = PcRecommend::get();
        foreach ($pcRecommend as $v) {
            if (empty($v->building_guid)) {
                $buildingGuid = Building::whereIn('id', $v->building_id)->pluck('guid')->toArray();
                $v->building_guid = $buildingGuid;
                if (!$v->save()) \Log::error('id为:'.$v->id.'的pc端精品推荐修改失败');

                $arr = array();
                foreach ($v->building_info as $key => $val) {
                        $arr[$key]['label'] = $val['label'];
                        $arr[$key]['value'] = Building::where('id',$val['value'])->first()->guid;
                }
                $v->building_info = $arr;
                if (!$v->save()) \Log::error('id为:'.$v->id.'的pc端精品推荐的楼盘信息修改失败');
            }
        }

        // 精品推荐表
        $recommend = Recommend::get();
        foreach ($recommend as $v) {
            if (empty($v->building_guid)) {
                $buildingGuid = Building::whereIn('id', $v->building_id)->pluck('guid')->toArray();
                $v->building_guid = $buildingGuid;
                if (!$v->save()) \Log::error('id为:'.$v->id.'的端精品推荐修改失败');
            }
        }

        $block = Block::get();
        foreach ($block as $v) {

            $mediaBlock = MediaBlock::find($v->id);

            $relBlock = RelBlock::create([
                'block_guid' => $v->guid,
                'recommend' => $mediaBlock->recommend,
                'agent_name' => $mediaBlock->agent_name,
                'agent_pic' => $mediaBlock->agent_pic,
            ]);
            if (empty($relBlock)) \Log::error('guid为:'.$v->guid.'的商圈关联信息添加失败');
        }
    }
}
