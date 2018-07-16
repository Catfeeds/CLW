<?php

use Illuminate\Database\Seeder;

use App\Models\PermissionGroup;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // banner管理
        PermissionGroup::create([
            'id' => 1,
            'group_name' => 'banner管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 服务管理
        PermissionGroup::create([
            'id' => 2,
            'group_name' => '服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 服务标签管理
        PermissionGroup::create([
            'id' => 3,
            'group_name' => '服务标签管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 推荐服务管理
        PermissionGroup::create([
            'id' => 4,
            'group_name' => '推荐服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // PC端企业服务管理
        PermissionGroup::create([
            'id' => 5,
            'group_name' => 'PC端企业服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // PC推荐服务管理
        PermissionGroup::create([
            'id' => 6,
            'group_name' => 'PC推荐服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 精品推荐管理
        PermissionGroup::create([
            'id' => 7,
            'group_name' => '精品推荐管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // PC精品推荐管理
        PermissionGroup::create([
            'id' => 8,
            'group_name' => 'PC精品推荐管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 热门商圈管理
        PermissionGroup::create([
            'id' => 9,
            'group_name' => '热门商圈管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 推荐写字楼管理
        PermissionGroup::create([
            'id' => 10,
            'group_name' => '推荐写字楼管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 公告管理
        PermissionGroup::create([
            'id' => 11,
            'group_name' => '公告管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 商圈管理
        PermissionGroup::create([
            'id' => 12,
            'group_name' => '商圈管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 楼盘管理
        PermissionGroup::create([
            'id' => 13,
            'group_name' => '楼盘管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 房源管理
        PermissionGroup::create([
            'id' => 14,
            'group_name' => '房源管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 用户管理
        PermissionGroup::create([
            'id' => 15,
            'group_name' => '用户管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 委托找房统计
        PermissionGroup::create([
            'id' => 16,
            'group_name' => '委托找房统计',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 投放房源统计
        PermissionGroup::create([
            'id' => 17,
            'group_name' => '投放房源统计',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 客服工单
        PermissionGroup::create([
            'id' => 18,
            'group_name' => '客服工单',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 中介系统权限管理
        PermissionGroup::create([
            'id' => 19,
            'group_name' => '中介系统权限管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 人员管理
        PermissionGroup::create([
            'id' => 20,
            'group_name' => '人员管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 提醒人员绑定管理
        PermissionGroup::create([
            'id' => 21,
            'group_name' => '提醒人员绑定管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // app版本管理
        PermissionGroup::create([
            'id' => 22,
            'group_name' => 'app版本管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 资讯管理
        PermissionGroup::create([
            'id' => 23,
            'group_name' => '资讯管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 后台系统权限管理
        PermissionGroup::create([
            'id' => 24,
            'group_name' => '后台系统权限管理',
            'parent_id' => null,
            'stage' => 1,
        ]);
    }
}
