<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\GoodsHasLabel;
use App\Models\Label;
use Illuminate\Console\Command;

class addShopClassLable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addShopClassLable';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '添加商城大类以及标签数据';

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

        \DB::beginTransaction();
        try {
            // 添加 大类 1. 办公家具 /plants   2.绿植租摆 /computers 3.办公设备 /furniture
            $categorys = [
                [
                    'id' => 1,
                    'name' => '办公设备',
                    'route' => '/computers',
                ],
                [
                    'id' => 2,
                    'name' => '绿植租摆',
                    'route' => '/plants ',
                ],
                [
                    'id' => 3,
                    'name' => '办公家具',
                    'route' => '/furniture',
                ]
            ];
            $this->info('开始添加大类......');
            foreach ($categorys as $category) {
                $res = Category::create($category);
                if ($res) {
                    $this->info($category['id'].'.'.$category['name'].'添加成功');
                } else {
                    $this->info($category['id'].'.'.$category['name'].'添加失败');
                }
            }
            $this->info('添加大类结束');
            // 添加标签
            // 1. 办公设备 添加一级标签 1.分类 2.品牌 3. 价格 4.屏幕尺寸
            // 1. 绿植租摆 添加一级标签 5.分类 6.选购方式 7.功效 8.盆栽类型
            // 1. 办公家具 添加一级标签 9.分类 10.价格
            $labels = [
                [
                    'id' => 1,
                    'category_id' => 1,
                    'parent_id' => null,
                    'name' => '分类',
                    'stage' => 1,
                ],
                [
                    'id' => 2,
                    'category_id' => 1,
                    'parent_id' => null,
                    'name' => '品牌',
                    'stage' => 1,
                ],
                [
                    'id' => 3,
                    'category_id' => 1,
                    'parent_id' => null,
                    'name' => '价格',
                    'stage' => 1,
                ],
                [
                    'id' => 4,
                    'category_id' => 1,
                    'parent_id' => null,
                    'name' => '屏幕尺寸',
                    'stage' => 1,
                ],
                [
                    'id' => 5,
                    'category_id' => 2,
                    'parent_id' => null,
                    'name' => '分类',
                    'stage' => 1,
                ],
                [
                    'id' => 6,
                    'category_id' => 2,
                    'parent_id' => null,
                    'name' => '品牌',
                    'stage' => 1,
                ],
                [
                    'id' => 7,
                    'category_id' => 2,
                    'parent_id' => null,
                    'name' => '价格',
                    'stage' => 1,
                ],
                [
                    'id' => 8,
                    'category_id' => 2,
                    'parent_id' => null,
                    'name' => '屏幕尺寸',
                    'stage' => 1,
                ],
                [
                    'id' => 9,
                    'category_id' => 3,
                    'parent_id' => null,
                    'name' => '分类',
                    'stage' => 1,
                ],
                [
                    'id' => 10,
                    'category_id' => 3,
                    'parent_id' => null,
                    'name' => '品牌',
                    'stage' => 1,
                ]
            ];
            $this->info('开始添加一级标签......');
            foreach ($labels as $label) {
                $res = Label::create($label);
                if ($res) {
                    $this->info($label['id'].'.'.$label['name'].'添加成功');
                } else {
                    $this->info($label['id'].'.'.$label['name'].'添加失败');
                }
            }
            $this->info('添加一级标签结束');
            // 添加子标签 办公设备
            // 分类 13.笔记本 14.台式机 15.一体机 16.平板电脑 17.打印设备
            // 品牌 18.TinkPad 19.Apple 20.Dell
            // 价格 21.0-100 22.100-200 23.200以上
            // 屏幕尺寸 24. 11.6英寸 25. 12.1英寸  26. 14.1英寸  27. 18.5英寸

            // 添加 绿植
            // 分类 28.绿植单品 29.绿植套餐 30.绿植养护
            // 选购方式 31.绿植租赁 32.绿植购买
            // 功效 33.美观 34.空气净化 35.净化甲醛 36.净化烟雾 37.防辐射 38.净化苯
            // 盆栽类型 39.大象盆栽 40.中型盆栽 41.小型盆栽

            // 添加 办公家具
            // 分类 42.班台  43.会议桌   44.办公桌  45. 文件柜   46. 沙发   47. 前台   48. 办公椅
            // 价格 49. 0-100   50. 100-200   51.200以上

            $labelTwos = [
                [
                    'id' => 13,
                    'category_id' => 1,
                    'parent_id' => 1,
                    'name' => '笔记本',
                    'stage' => 2,
                ],
                [
                    'id' => 14,
                    'category_id' => 1,
                    'parent_id' => 1,
                    'name' => '台式机',
                    'stage' => 2,
                ],
                [
                    'id' => 15,
                    'category_id' => 1,
                    'parent_id' => 1,
                    'name' => '一体机',
                    'stage' => 2,
                ],
                [
                    'id' => 16,
                    'category_id' => 1,
                    'parent_id' => 1,
                    'name' => '平板电脑',
                    'stage' => 2,
                ],
                [
                    'id' => 18,
                    'category_id' => 1,
                    'parent_id' => 2,
                    'name' => 'TinkPad',
                    'stage' => 2,
                ],
                [
                    'id' => 19,
                    'category_id' => 1,
                    'parent_id' => 2,
                    'name' => 'Apple',
                    'stage' => 2,
                ],
                [
                    'id' => 20,
                    'category_id' => 1,
                    'parent_id' => 2,
                    'name' => 'Dell',
                    'stage' => 2,
                ],
                [
                    'id' => 21,
                    'category_id' => 1,
                    'parent_id' => 3,
                    'name' => '0-100',
                    'stage' => 2,
                ],
                [
                    'id' => 22,
                    'category_id' => 1,
                    'parent_id' => 3,
                    'name' => '100-200',
                    'stage' => 2,
                ],
                [
                    'id' => 23,
                    'category_id' => 1,
                    'parent_id' => 3,
                    'name' => '200以上',
                    'stage' => 2,
                ],
                [
                    'id' => 24,
                    'category_id' => 1,
                    'parent_id' => 4,
                    'name' => '11.6英寸',
                    'stage' => 2,
                ],
                [
                    'id' => 25,
                    'category_id' => 1,
                    'parent_id' => 4,
                    'name' => '12.1英寸',
                    'stage' => 2,
                ],
                [
                    'id' => 26,
                    'category_id' => 1,
                    'parent_id' => 4,
                    'name' => '14.1英寸',
                    'stage' => 2,
                ],
                [
                    'id' => 27,
                    'category_id' => 1,
                    'parent_id' => 4,
                    'name' => '18.5英寸',
                    'stage' => 2,
                ],
                [
                    'id' => 28,
                    'category_id' => 2,
                    'parent_id' => 5,
                    'name' => '绿植单品',
                    'stage' => 2,
                ],
                [
                    'id' => 29,
                    'category_id' => 2,
                    'parent_id' => 5,
                    'name' => '绿植套餐',
                    'stage' => 2,
                ],
                [
                    'id' => 30,
                    'category_id' => 2,
                    'parent_id' => 5,
                    'name' => '绿植养护',
                    'stage' => 2,
                ],
                [
                    'id' => 31,
                    'category_id' => 2,
                    'parent_id' => 6,
                    'name' => '绿植租赁',
                    'stage' => 2,
                ],
                [
                    'id' => 32,
                    'category_id' => 2,
                    'parent_id' => 6,
                    'name' => '绿植购买',
                    'stage' => 2,
                ],
                [
                    'id' => 33,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '美观',
                    'stage' => 2,
                ],
                [
                    'id' => 34,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '空气净化',
                    'stage' => 2,
                ],
                [
                    'id' => 35,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '净化甲醛',
                    'stage' => 2,
                ],
                [
                    'id' => 36,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '净化烟雾',
                    'stage' => 2,
                ],
                [
                    'id' => 37,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '防辐射',
                    'stage' => 2,
                ],
                [
                    'id' => 38,
                    'category_id' => 2,
                    'parent_id' => 7,
                    'name' => '净化苯',
                    'stage' => 2,
                ],
                [
                    'id' => 39,
                    'category_id' => 2,
                    'parent_id' => 8,
                    'name' => '大象盆栽',
                    'stage' => 2,
                ],
                [
                    'id' => 40,
                    'category_id' => 2,
                    'parent_id' => 8,
                    'name' => '中型盆栽',
                    'stage' => 2,
                ],
                [
                    'id' => 41,
                    'category_id' => 2,
                    'parent_id' => 8,
                    'name' => '小型盆栽',
                    'stage' => 2,
                ],
                [
                    'id' => 42,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '小型盆栽',
                    'stage' => 2,
                ],
                [
                    'id' => 43,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '会议桌',
                    'stage' => 2,
                ],
                [
                    'id' => 44,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '办公桌',
                    'stage' => 2,
                ],
                [
                    'id' => 45,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '文件柜',
                    'stage' => 2,
                ],
                [
                    'id' => 46,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '沙发',
                    'stage' => 2,
                ],
                [
                    'id' => 47,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '前台',
                    'stage' => 2,
                ],
                [
                    'id' => 48,
                    'category_id' => 3,
                    'parent_id' => 9,
                    'name' => '办公椅',
                    'stage' => 2,
                ],
                [
                    'id' => 49,
                    'category_id' => 3,
                    'parent_id' => 10,
                    'name' => '0-100',
                    'stage' => 2,
                ],
                [
                    'id' => 50,
                    'category_id' => 3,
                    'parent_id' => 10,
                    'name' => '100-200',
                    'stage' => 2,
                ],
                [
                    'id' => 51,
                    'category_id' => 3,
                    'parent_id' => 10,
                    'name' => '200以上',
                    'stage' => 2,
                ]
            ];
            $this->info('开始添加二级标签.......');
            foreach ($labelTwos as $labelTwo) {
                $res = Label::create($labelTwo);
                if ($res) {
                    $this->info($labelTwo['id'].'.'.$labelTwo['name'].'添加成功');
                } else {
                    $this->info($labelTwo['id'].'.'.$labelTwo['name'].'添加失败');
                }
            }
            $this->info('添加二级标签结束');
            $this->info('标签数据添加完成');

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            $this->info('添加失败，回滚成功');
            return false;
        }
    }
}
