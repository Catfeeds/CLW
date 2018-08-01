<?php

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // banner管理
        Permission::create([
            'name' => 'banner_list',
            'guard_name' => 'web',
            'label' => 'banner列表',
            'group_id' => 1,
        ]);

        Permission::create([
            'name' => 'add_banner',
            'guard_name' => 'web',
            'label' => '添加banner',
            'group_id' => 1,
        ]);

        Permission::create([
            'name' => 'update_banner',
            'guard_name' => 'web',
            'label' => '更新banner',
            'group_id' => 1,
        ]);

        Permission::create([
            'name' => 'del_banner',
            'guard_name' => 'web',
            'label' => '删除banner',
            'group_id' => 1,
        ]);

        //服务管理
        Permission::create([
            'name' => 'service_list',
            'guard_name' => 'web',
            'label' => '服务列表',
            'group_id' => 2,
        ]);

        Permission::create([
            'name' => 'add_service',
            'guard_name' => 'web',
            'label' => '添加服务',
            'group_id' => 2,
        ]);

        Permission::create([
            'name' => 'update_service',
            'guard_name' => 'web',
            'label' => '修改服务',
            'group_id' => 2,
        ]);

        Permission::create([
            'name' => 'del_service',
            'guard_name' => 'web',
            'label' => '删除服务',
            'group_id' => 2,
        ]);

        //服务标签管理
        Permission::create([
            'name' => 'service_label_list',
            'guard_name' => 'web',
            'label' => '服务标签管理',
            'group_id' => 3,
        ]);

        Permission::create([
            'name' => 'add_service_label',
            'guard_name' => 'web',
            'label' => '添加服务标签',
            'group_id' => 3,
        ]);

        Permission::create([
            'name' => 'update_service_label',
            'guard_name' => 'web',
            'label' => '修改服务标签',
            'group_id' => 3,
        ]);


        //推荐服务管理
        Permission::create([
            'name' => 'service_recommends_list',
            'guard_name' => 'web',
            'label' => '推荐服务列表',
            'group_id' => 4,
        ]);

        Permission::create([
            'name' => 'add_service_recommend',
            'guard_name' => 'web',
            'label' => '添加推荐服务',
            'group_id' => 4,
        ]);

        Permission::create([
            'name' => 'update_service_recommend',
            'guard_name' => 'web',
            'label' => '修改推荐服务',
            'group_id' => 4,
        ]);

        Permission::create([
            'name' => 'del_service_recommend',
            'guard_name' => 'web',
            'label' => '删除推荐服务',
            'group_id' => 4,
        ]);

        //PC服务管理
        Permission::create([
            'name' => 'Pc_enterprise_services_list',
            'guard_name' => 'web',
            'label' => 'PC端企业服务列表',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'add_pc_enterprise_services',
            'guard_name' => 'web',
            'label' => '添加PC端企业服务',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'update_pc_enterprise_services',
            'guard_name' => 'web',
            'label' => '修改PC端企业服务',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'del_pc_enterprise_services',
            'guard_name' => 'web',
            'label' => '删除PC端企业服务',
            'group_id' => 5,
        ]);

        //PC推荐服务管理
        Permission::create([
            'name' => 'Pc_service_recommend_list',
            'guard_name' => 'web',
            'label' => 'PC端推荐服务列表',
            'group_id' => 6,
        ]);

        Permission::create([
            'name' => 'add_pc_service_recommend',
            'guard_name' => 'web',
            'label' => '添加PC端推荐服务',
            'group_id' => 6,
        ]);

        Permission::create([
            'name' => 'update_pc_service_recommend',
            'guard_name' => 'web',
            'label' => '修改PC端推荐服务',
            'group_id' => 6,
        ]);

        Permission::create([
            'name' => 'del_pc_service_recommend',
            'guard_name' => 'web',
            'label' => '删除PC端推荐服务',
            'group_id' => 6,
        ]);

        //精品推荐管理
        Permission::create([
            'name' => 'recommends_list',
            'guard_name' => 'web',
            'label' => '精品推荐列表',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'add_recommends',
            'guard_name' => 'web',
            'label' => '添加精品推荐',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'update_recommends',
            'guard_name' => 'web',
            'label' => '修改精品推荐',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'del_recommends',
            'guard_name' => 'web',
            'label' => '删除精品推荐',
            'group_id' => 7,
        ]);

        //PC精品推荐管理
        Permission::create([
            'name' => 'Pc_recommends_list',
            'guard_name' => 'web',
            'label' => 'PC端精品推荐列表',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'add_pc_recommends',
            'guard_name' => 'web',
            'label' => '添加PC端精品推荐',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'update_pc_recommends',
            'guard_name' => 'web',
            'label' => '修改PC端精品推荐',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'del_pc_recommends',
            'guard_name' => 'web',
            'label' => '删除PC端精品推荐',
            'group_id' => 8,
        ]);

        //热门商圈管理
        Permission::create([
            'name' => 'hotBlocks_list',
            'guard_name' => 'web',
            'label' => '热门商圈列表',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'add_hot_blocks',
            'guard_name' => 'web',
            'label' => '添加热门商圈',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'update_hot_blocks',
            'guard_name' => 'web',
            'label' => '修改热门商圈',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'del_hot_blocks',
            'guard_name' => 'web',
            'label' => '删除热门商圈',
            'group_id' => 9,
        ]);

        //推荐写字楼管理
        Permission::create([
            'name' => 'buildings_recommend_list',
            'guard_name' => 'web',
            'label' => '写字楼推荐列表',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'add_building_recommend',
            'guard_name' => 'web',
            'label' => '添加写字楼推荐',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'update_building_recommend',
            'guard_name' => 'web',
            'label' => '修改写字楼推荐',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'del_building_recommend',
            'guard_name' => 'web',
            'label' => '删除写字楼推荐',
            'group_id' => 10,
        ]);

        //公告管理
        Permission::create([
            'name' => 'system_notices_list',
            'guard_name' => 'web',
            'label' => '系统公告列表',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'add_system_notices',
            'guard_name' => 'web',
            'label' => '添加系统公告',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'update_system_notices',
            'guard_name' => 'web',
            'label' => '修改系统公告',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'del_system_notices',
            'guard_name' => 'web',
            'label' => '删除系统公告',
            'group_id' => 11,
        ]);

        //商圈管理
        Permission::create([
            'name' => 'block_list',
            'guard_name' => 'web',
            'label' => '商圈列表',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'add_block',
            'guard_name' => 'web',
            'label' => '添加商圈',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'update_block',
            'guard_name' => 'web',
            'label' => '修改商圈',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'del_block',
            'guard_name' => 'web',
            'label' => '删除商圈',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'recommend_block_list',
            'guard_name' => 'web',
            'label' => '推荐商圈列表',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'add_recommend_block',
            'guard_name' => 'web',
            'label' => '添加推荐商圈',
            'group_id' => 12,
        ]);

        //楼盘管理
        Permission::create([
            'name' => 'building_lists',
            'guard_name' => 'web',
            'label' => '楼盘列表',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'add_building',
            'guard_name' => 'web',
            'label' => '添加楼盘',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'update_building',
            'guard_name' => 'web',
            'label' => '修改楼盘',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'building_feature_list',
            'guard_name' => 'web',
            'label' => '楼盘特色列表',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'add_building_feature',
            'guard_name' => 'web',
            'label' => '添加楼盘特色',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'update_building_feature',
            'guard_name' => 'web',
            'label' => '修改楼盘特色',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'del_building_feature',
            'guard_name' => 'web',
            'label' => '删除楼盘特色',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'add_building_label',
            'guard_name' => 'web',
            'label' => '添加楼盘标签',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'del_building_label',
            'guard_name' => 'web',
            'label' => '删除楼盘标签',
            'group_id' => 13,
        ]);

        //房源管理
        Permission::create([
            'name' => 'House_list',
            'guard_name' => 'web',
            'label' => '房源列表',
            'group_id' => 14,
        ]);

        Permission::create([
            'name' => 'add_house_label',
            'guard_name' => 'web',
            'label' => '添加房源标签',
            'group_id' => 14,
        ]);

        Permission::create([
            'name' => 'show_house',
            'guard_name' => 'web',
            'label' => '房源上架',
            'group_id' => 14,
        ]);

        Permission::create([
            'name' => 'del_house_label',
            'guard_name' => 'web',
            'label' => '删除房源标签',
            'group_id' => 14,
        ]);

        Permission::create([
            'name' => 'del_show_house',
            'guard_name' => 'web',
            'label' => '房源下架',
            'group_id' => 14,
        ]);

        //用户管理
        Permission::create([
            'name' => 'users_list',
            'guard_name' => 'web',
            'label' => '用户列表',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'user_show',
            'guard_name' => 'web',
            'label' => '用户基本信息',
            'group_id' => 15,
        ]);

        //委托找房统计
        Permission::create([
            'name' => 'bespeak_list',
            'guard_name' => 'web',
            'label' => '委托找房列表',
            'group_id' => 16,
        ]);

        Permission::create([
            'name' => 'bespeak_statistic',
            'guard_name' => 'web',
            'label' => '委托找房统计',
            'group_id' => 16,
        ]);

        //投放房源统计
        Permission::create([
            'name' => 'throw_ins_list',
            'guard_name' => 'web',
            'label' => '投放房源列表',
            'group_id' => 17,
        ]);

        Permission::create([
            'name' => 'throw_ins_statistic',
            'guard_name' => 'web',
            'label' => '投放房源统计',
            'group_id' => 17,
        ]);

        //客服工单
        Permission::create([
            'name' => 'raw_custom_list',
            'guard_name' => 'web',
            'label' => '工单类表',
            'group_id' => 18,
        ]);

        Permission::create([
            'name' => 'add_raw_custom',
            'guard_name' => 'web',
            'label' => '添加工单',
            'group_id' => 18,
        ]);

        //中介系统权限管理
        Permission::create([
            'name' => 'permission_groups_list',
            'guard_name' => 'web',
            'label' => '中介系统权限组列表',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'add_permission_groups',
            'guard_name' => 'web',
            'label' => '添加中介系统权限组',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'permission_list',
            'guard_name' => 'web',
            'label' => '中介系统权限列表',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'add_permission',
            'guard_name' => 'web',
            'label' => '添加中介系统权限',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'update_permission',
            'guard_name' => 'web',
            'label' => '修改中介系统权限',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'del_permission',
            'guard_name' => 'web',
            'label' => '删除中介系统权限',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'role_list',
            'guard_name' => 'web',
            'label' => '中介系统角色列表',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'add_role',
            'guard_name' => 'web',
            'label' => '添加中介系统角色',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'update_role',
            'guard_name' => 'web',
            'label' => '修改中介系统角色',
            'group_id' => 19,
        ]);

        //人员管理
        Permission::create([
            'name' => 'employees_list',
            'guard_name' => 'web',
            'label' => '员工列表',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'add_employees',
            'guard_name' => 'web',
            'label' => '员工绑定',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'update_employees',
            'guard_name' => 'web',
            'label' => '修改员工信息',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'del_employees',
            'guard_name' => 'web',
            'label' => '员工解绑',
            'group_id' => 20,
        ]);

        //提醒人员绑定管理
        Permission::create([
            'name' => 'accept_message_list',
            'guard_name' => 'web',
            'label' => '消息提醒人员列表',
            'group_id' => 21,
        ]);

        Permission::create([
            'name' => 'add_accept_message',
            'guard_name' => 'web',
            'label' => '添加消息提醒人员',
            'group_id' => 21,
        ]);

        Permission::create([
            'name' => 'del_accept_message',
            'guard_name' => 'web',
            'label' => '消息提醒人员解绑',
            'group_id' => 21,
        ]);

        //app版本管理
        Permission::create([
            'name' => 'app_android_list',
            'guard_name' => 'web',
            'label' => 'app版本列表',
            'group_id' => 22,
        ]);

        Permission::create([
            'name' => 'add_app_android',
            'guard_name' => 'web',
            'label' => '添加app版本',
            'group_id' => 22,
        ]);

        //资讯管理
        Permission::create([
            'name' => 'information_list',
            'guard_name' => 'web',
            'label' => '资讯列表',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'add_information',
            'guard_name' => 'web',
            'label' => '添加资讯',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'information_edit',
            'guard_name' => 'web',
            'label' => '添加资讯',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'del_information',
            'guard_name' => 'web',
            'label' => '删除资讯',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'set_top',
            'guard_name' => 'web',
            'label' => '资讯置顶',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'del_top',
            'guard_name' => 'web',
            'label' => '取消资讯置顶',
            'group_id' => 23,
        ]);

        //后台系统权限管理
        Permission::create([
            'name' => 'backstage_permission_groups_list',
            'guard_name' => 'web',
            'label' => '管理平台权限组列表',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_add_permission_groups',
            'guard_name' => 'web',
            'label' => '添加管理平台权限组',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_permission_list',
            'guard_name' => 'web',
            'label' => '管理平台权限列表',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_add_permission',
            'guard_name' => 'web',
            'label' => '添加管理平台系统权限',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_update_permission',
            'guard_name' => 'web',
            'label' => '修改管理平台系统权限',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_del_permission',
            'guard_name' => 'web',
            'label' => '删除管理平台系统权限',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_role_list',
            'guard_name' => 'web',
            'label' => '管理平台角色列表',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_add_role',
            'guard_name' => 'web',
            'label' => '添加管理平台角色',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'backstage_update_role',
            'guard_name' => 'web',
            'label' => '修改管理平台角色',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'add_admin_user',
            'guard_name' => 'web',
            'label' => '添加后台用户',
            'group_id' => 24,
        ]);
    }
}
