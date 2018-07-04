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
        // 消息接受管理
        PermissionGroup::create([
            'id' => 1,
            'group_name' => '消息接受管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 后台管理员管理
        PermissionGroup::create([
            'id' => 2,
            'group_name' => '后台管理员管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // app版本管理
        PermissionGroup::create([
            'id' => 3,
            'group_name' => 'app版本管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 后台系统权限组管理
        PermissionGroup::create([
            'id' => 4,
            'group_name' => '后台系统权限组管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 后台系统权限管理
        PermissionGroup::create([
            'id' => 5,
            'group_name' => '后台系统权限管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 后台系统角色管理
        PermissionGroup::create([
            'id' => 6,
            'group_name' => '后台系统角色管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // banner管理
        PermissionGroup::create([
            'id' => 7,
            'group_name' => 'banner管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 商圈管理
        PermissionGroup::create([
            'id' => 8,
            'group_name' => '商圈管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 楼盘特色管理
        PermissionGroup::create([
            'id' => 9,
            'group_name' => '楼盘特色管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 楼盘推荐管理
        PermissionGroup::create([
            'id' => 10,
            'group_name' => '楼盘推荐管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 楼盘管理
        PermissionGroup::create([
            'id' => 11,
            'group_name' => '楼盘管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 员工管理
        PermissionGroup::create([
            'id' => 12,
            'group_name' => '员工管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 热门商圈管理
        PermissionGroup::create([
            'id' => 13,
            'group_name' => '热门商圈管理',
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

        // 中介用户管理
        PermissionGroup::create([
            'id' => 15,
            'group_name' => '中介用户管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 中介系统权限组管理
        PermissionGroup::create([
            'id' => 16,
            'group_name' => '中介系统权限组管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 中介系统权限管理
        PermissionGroup::create([
            'id' => 17,
            'group_name' => '中介系统权限管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 中介系统角色管理
        PermissionGroup::create([
            'id' => 18,
            'group_name' => '中介系统角色管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 精品推荐管理
        PermissionGroup::create([
            'id' => 19,
            'group_name' => '精品推荐管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 服务标签管理
        PermissionGroup::create([
            'id' => 20,
            'group_name' => '服务标签管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 推荐服务管理
        PermissionGroup::create([
            'id' => 21,
            'group_name' => '推荐服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 服务管理
        PermissionGroup::create([
            'id' => 22,
            'group_name' => '服务管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 系统公告管理
        PermissionGroup::create([
            'id' => 23,
            'group_name' => '系统公告管理',
            'parent_id' => null,
            'stage' => 1,
        ]);

        // 用户管理
        PermissionGroup::create([
            'id' => 24,
            'group_name' => '用户管理',
            'parent_id' => null,
            'stage' => 1,
        ]);
    }
}
