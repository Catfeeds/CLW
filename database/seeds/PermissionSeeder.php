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
        // 消息接受管理
        Permission::create([
            'name' => 'messages_list',
            'guard_name' => 'web',
            'label' => '消息接收人员列表',
            'group_id' => 1,
        ]);

        Permission::create([
            'name' => 'add_message',
            'guard_name' => 'web',
            'label' => '添加消息接收人员',
            'group_id' => 1,
        ]);

        Permission::create([
            'name' => 'del_message',
            'guard_name' => 'web',
            'label' => '删除消息接收人员',
            'group_id' => 1,
        ]);

        //后台管理员管理
        Permission::create([
            'name' => 'add_admin',
            'guard_name' => 'web',
            'label' => '添加管理员',
            'group_id' => 2,
        ]);

        Permission::create([
            'name' => 'show_admin',
            'guard_name' => 'web',
            'label' => '管理员信息',
            'group_id' => 2,
        ]);

        //app版本管理
        Permission::create([
            'name' => 'app_android_list',
            'guard_name' => 'web',
            'label' => 'app版本列表',
            'group_id' => 3,
        ]);

        Permission::create([
            'name' => 'add_app_android',
            'guard_name' => 'web',
            'label' => '添加app版本',
            'group_id' => 3,
        ]);


        //后台系统权限组管理
        Permission::create([
            'name' => 'backstage_permission_groups_list',
            'guard_name' => 'web',
            'label' => '权限组列表',
            'group_id' => 4,
        ]);

        Permission::create([
            'name' => 'add_backstage_permission_groups',
            'guard_name' => 'web',
            'label' => '添加权限组',
            'group_id' => 4,
        ]);

        //后台系统权限管理
        Permission::create([
            'name' => 'backstage_permission_list',
            'guard_name' => 'web',
            'label' => '权限列表',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'add_backstage_permission',
            'guard_name' => 'web',
            'label' => '添加权限',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'update_backstage_permission',
            'guard_name' => 'web',
            'label' => '修改权限',
            'group_id' => 5,
        ]);

        Permission::create([
            'name' => 'del_backstage_permission',
            'guard_name' => 'web',
            'label' => '删除权限',
            'group_id' => 5,
        ]);

        //后台系统角色管理
        Permission::create([
            'name' => 'backstage_roles_list',
            'guard_name' => 'web',
            'label' => '角色列表',
            'group_id' => 6,
        ]);

        Permission::create([
            'name' => 'update_backstage_roles',
            'guard_name' => 'web',
            'label' => '修改角色',
            'group_id' => 6,
        ]);

        //banner管理
        Permission::create([
            'name' => 'banner_list',
            'guard_name' => 'web',
            'label' => 'banner列表',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'add_banner',
            'guard_name' => 'web',
            'label' => '添加banner',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'update_banner',
            'guard_name' => 'web',
            'label' => '修改banner',
            'group_id' => 7,
        ]);

        Permission::create([
            'name' => 'del_banner',
            'guard_name' => 'web',
            'label' => '删除banner',
            'group_id' => 7,
        ]);

        //商圈管理
        Permission::create([
            'name' => 'block_list',
            'guard_name' => 'web',
            'label' => '商圈列表',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'add_block',
            'guard_name' => 'web',
            'label' => '添加商圈',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'update_block',
            'guard_name' => 'web',
            'label' => '修改商圈',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'del_block',
            'guard_name' => 'web',
            'label' => '删除商圈',
            'group_id' => 8,
        ]);

        Permission::create([
            'name' => 'add_block_recommend',
            'guard_name' => 'web',
            'label' => '添加商圈推荐',
            'group_id' => 8,
        ]);

        //楼盘特色管理
        Permission::create([
            'name' => 'building_feature_list',
            'guard_name' => 'web',
            'label' => '楼盘特色列表',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'add_building_feature',
            'guard_name' => 'web',
            'label' => '添加楼盘特色',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'update_building_feature',
            'guard_name' => 'web',
            'label' => '修改楼盘特色',
            'group_id' => 9,
        ]);

        Permission::create([
            'name' => 'del_building_feature',
            'guard_name' => 'web',
            'label' => '删除楼盘特色',
            'group_id' => 9,
        ]);

        //楼盘推荐管理
        Permission::create([
            'name' => 'buildings_recommend_list',
            'guard_name' => 'web',
            'label' => '楼盘推荐列表',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'add_building_recommend',
            'guard_name' => 'web',
            'label' => '添加楼盘推荐',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'update_building_recommend',
            'guard_name' => 'web',
            'label' => '修改楼盘推荐',
            'group_id' => 10,
        ]);

        Permission::create([
            'name' => 'del_building_recommend',
            'guard_name' => 'web',
            'label' => '删除楼盘推荐',
            'group_id' => 10,
        ]);

        //楼盘管理
        Permission::create([
            'name' => 'building_lists',
            'guard_name' => 'web',
            'label' => '楼盘列表',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'add_building',
            'guard_name' => 'web',
            'label' => '添加楼盘',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'update_building',
            'guard_name' => 'web',
            'label' => '修改楼盘',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'add_building_label',
            'guard_name' => 'web',
            'label' => '添加楼盘标签',
            'group_id' => 11,
        ]);

        Permission::create([
            'name' => 'del_building_label',
            'guard_name' => 'web',
            'label' => '删除楼盘标签',
            'group_id' => 11,
        ]);

        //员工管理
        Permission::create([
            'name' => 'employees_list',
            'guard_name' => 'web',
            'label' => '员工列表',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'add_employees',
            'guard_name' => 'web',
            'label' => '添加员工',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'update_employees',
            'guard_name' => 'web',
            'label' => '修改员工',
            'group_id' => 12,
        ]);

        Permission::create([
            'name' => 'del_employees',
            'guard_name' => 'web',
            'label' => '删除员工',
            'group_id' => 12,
        ]);

        //热门商圈管理
        Permission::create([
            'name' => 'hot_blocks_list',
            'guard_name' => 'web',
            'label' => '热门商圈列表',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'add_hot_blocks',
            'guard_name' => 'web',
            'label' => '添加热门商圈',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'update_hot_blocks',
            'guard_name' => 'web',
            'label' => '修改热门商圈',
            'group_id' => 13,
        ]);

        Permission::create([
            'name' => 'del_hot_blocks',
            'guard_name' => 'web',
            'label' => '删除热门商圈',
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

        //资讯管理
        Permission::create([
            'name' => 'information_list',
            'guard_name' => 'web',
            'label' => '资讯列表',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'add_information',
            'guard_name' => 'web',
            'label' => '添加资讯',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'update_information',
            'guard_name' => 'web',
            'label' => '修改资讯',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'del_information',
            'guard_name' => 'web',
            'label' => '删除资讯',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'set_top',
            'guard_name' => 'web',
            'label' => '资讯置顶',
            'group_id' => 15,
        ]);

        Permission::create([
            'name' => 'del_top',
            'guard_name' => 'web',
            'label' => '取消资讯置顶',
            'group_id' => 15,
        ]);

        //中介用户管理
        Permission::create([
            'name' => 'media_user_list',
            'guard_name' => 'web',
            'label' => '中介用户列表',
            'group_id' => 16,
        ]);

        Permission::create([
            'name' => 'update_media_user',
            'guard_name' => 'web',
            'label' => '修改中介用户角色',
            'group_id' => 16,
        ]);

        //中介系统权限组管理
        Permission::create([
            'name' => 'permission_group_list',
            'guard_name' => 'web',
            'label' => '权限组列表',
            'group_id' => 17,
        ]);

        Permission::create([
            'name' => 'add_permission_group',
            'guard_name' => 'web',
            'label' => '添加权限组',
            'group_id' => 17,
        ]);

        //中介系统权限管理
        Permission::create([
            'name' => 'permission_list',
            'guard_name' => 'web',
            'label' => '权限列表',
            'group_id' => 18,
        ]);

        Permission::create([
            'name' => 'add_permission',
            'guard_name' => 'web',
            'label' => '添加权限',
            'group_id' => 18,
        ]);

        Permission::create([
            'name' => 'update_permission',
            'guard_name' => 'web',
            'label' => '修改权限',
            'group_id' => 18,
        ]);

        Permission::create([
            'name' => 'del_permission',
            'guard_name' => 'web',
            'label' => '删除权限',
            'group_id' => 18,
        ]);

        //中介系统角色管理
        Permission::create([
            'name' => 'roles_list',
            'guard_name' => 'web',
            'label' => '角色列表',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'add_roles',
            'guard_name' => 'web',
            'label' => '添加角色',
            'group_id' => 19,
        ]);

        Permission::create([
            'name' => 'update_roles',
            'guard_name' => 'web',
            'label' => '修改角色',
            'group_id' => 19,
        ]);

        //精品推荐管理
        Permission::create([
            'name' => 'recommends_list',
            'guard_name' => 'web',
            'label' => '精品推荐列表',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'add_recommends',
            'guard_name' => 'web',
            'label' => '添加精品推荐',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'update_recommends',
            'guard_name' => 'web',
            'label' => '修改精品推荐',
            'group_id' => 20,
        ]);

        Permission::create([
            'name' => 'del_recommends',
            'guard_name' => 'web',
            'label' => '删除精品推荐',
            'group_id' => 20,
        ]);

        //服务标签管理
        Permission::create([
            'name' => 'service_label_list',
            'guard_name' => 'web',
            'label' => '服务标签列表',
            'group_id' => 21,
        ]);

        Permission::create([
            'name' => 'add_service_label',
            'guard_name' => 'web',
            'label' => '添加服务标签',
            'group_id' => 21,
        ]);

        Permission::create([
            'name' => 'update_service_label',
            'guard_name' => 'web',
            'label' => '修改服务标签',
            'group_id' => 21,
        ]);

        //推荐服务管理
        Permission::create([
            'name' => 'service_recommends_list',
            'guard_name' => 'web',
            'label' => '推荐服务列表',
            'group_id' => 22,
        ]);

        Permission::create([
            'name' => 'add_service_recommends',
            'guard_name' => 'web',
            'label' => '添加推荐服务',
            'group_id' => 22,
        ]);

        Permission::create([
            'name' => 'update_service_recommends',
            'guard_name' => 'web',
            'label' => '修改推荐服务',
            'group_id' => 22,
        ]);

        Permission::create([
            'name' => 'del_service_recommends',
            'guard_name' => 'web',
            'label' => '删除推荐服务',
            'group_id' => 22,
        ]);

        //服务管理
        Permission::create([
            'name' => 'service_list',
            'guard_name' => 'web',
            'label' => '服务列表',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'add_service',
            'guard_name' => 'web',
            'label' => '添加服务',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'update_service',
            'guard_name' => 'web',
            'label' => '修改服务',
            'group_id' => 23,
        ]);

        Permission::create([
            'name' => 'del_service',
            'guard_name' => 'web',
            'label' => '删除服务',
            'group_id' => 23,
        ]);

        //系统公告管理
        Permission::create([
            'name' => 'system_notices_list',
            'guard_name' => 'web',
            'label' => '系统公告列表',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'add_system_notices',
            'guard_name' => 'web',
            'label' => '添加系统公告',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'update_system_notices',
            'guard_name' => 'web',
            'label' => '修改系统公告',
            'group_id' => 24,
        ]);

        Permission::create([
            'name' => 'del_system_notices',
            'guard_name' => 'web',
            'label' => '删除系统公告',
            'group_id' => 24,
        ]);

        //用户管理
        Permission::create([
            'name' => 'user_list',
            'guard_name' => 'web',
            'label' => '用户列表',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'show_user',
            'guard_name' => 'web',
            'label' => '用户信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'statistics_info',
            'guard_name' => 'web',
            'label' => '用户统计信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'user_bespeak_info',
            'guard_name' => 'web',
            'label' => '用户委托找房信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'user_throw_inInfo',
            'guard_name' => 'web',
            'label' => '用户投放房源信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'tel_inquiry_info',
            'guard_name' => 'web',
            'label' => '电话咨询统计信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'login_log',
            'guard_name' => 'web',
            'label' => '登录日志信息',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'enable',
            'guard_name' => 'web',
            'label' => '用户启用',
            'group_id' => 25,
        ]);

        Permission::create([
            'name' => 'disable',
            'guard_name' => 'web',
            'label' => '用户禁用',
            'group_id' => 25,
        ]);



    }
}
