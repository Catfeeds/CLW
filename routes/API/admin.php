<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
header('Access-Control-Allow-Headers:X-Token,Content-Type,Authorization,safeString');
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    //导出数据
    Route::post('export', 'EntrustThrowInsController@export');
    // 安全验证码
    Route::get('get_safe_string', 'BannerController@safeString');
    // 登录
    Route::resource('logins','LoginsController');

    Route::resource('labels', 'LabelsController');

    // 安全验证
    Route::group(['middleware' => 'safe.validate'], function () {
        /*
        |--------------------------------------------------------------------------
        | 工单管理
        |--------------------------------------------------------------------------
        */
        Route::resource('work_orders', 'WorkOrderController');


        //微信绑定管理
        Route::resource('employees', 'EmployeesController');

        //换绑微信
        Route::post('update_wechat', 'EmployeesController@updateWechat');

        //--------- 中介系统权限管理
        // 权限组管理
        Route::resource('permission_groups','PermissionGroupsController');
        // 权限管理
        Route::resource('permissions','PermissionsController');
        Route::get('permissions_group', 'PermissionsController@permissionsGroup');
        // 角色管理
        Route::resource('roles','RolesController');
        Route::get('get_all_permissions', 'RolesController@getAllPermissions');
        //-------

        //------  CLW后台权限管理
        // 权限组管理
        Route::resource('backstage_permission_groups','BackstagePermissionGroupsController');
        // 权限管理
        Route::resource('backstage_permissions','BackstagePermissionsController');
        Route::get('backstage_permissions_group', 'BackstagePermissionsController@permissionsGroup');
        // 角色管理
        Route::resource('backstage_roles','BackstageRolesController');
        Route::get('backstage_get_all_permissions', 'BackstageRolesController@getAllPermissions');
        Route::get('get_roles','BackstageRolesController@getRoles');
        //------


        // 中介用户
        Route::resource('media_user','MediaUsersController');

        // 七牛token
        Route::get('/get_qi_niu_token', 'BannerController@token');
    });

    Route::group(['middleware' => 'apiAuth:admin'], function () {
        // 退出
        Route::post('logout','LoginsController@logout');

        /*
        |--------------------------------------------------------------------------
        | 管理员
        |--------------------------------------------------------------------------
        */
        Route::resource('admins','AdminsController');

        //为现有用户分配角色
        Route::post('distributions', 'AdminsController@distribution');

        /*
        |--------------------------------------------------------------------------
        | 用户管理
        |--------------------------------------------------------------------------
        */
        Route::resource('users', 'UsersController');
        // 详情统计信息
        Route::get('statistics_info/{id}', 'UsersController@statisticsInfo');
        // 用户委托找房信息
        Route::get('user_bespeak_info/{id}', 'UsersController@userBespeakInfo');
        // 用户投放房源信息
        Route::get('user_throw_in_info/{id}', 'UsersController@userThrowInInfo');
        // 电话质询统计信息
        Route::get('tel_inquiry_info/{id}', 'UsersController@telInquiryInfo');
        // 登录日志
        Route::get('login_log/{id}', 'UsersController@loginLog');

        Route::resource('bespeak_sta', 'BespeakStaController');

        //启用
        Route::get('enable/{id}','UsersController@enable');
        //禁用
        Route::get('disable/{id}','UsersController@disable');

        /*
        |--------------------------------------------------------------------------
        | banner管理
        |--------------------------------------------------------------------------
        */
        Route::resource('banners','BannerController');

        /*
        |--------------------------------------------------------------------------
        | 服务管理
        |--------------------------------------------------------------------------
        */
        Route::resource('services', 'ServicesController');

        /*
        |--------------------------------------------------------------------------
        | 服务标签管理
        |--------------------------------------------------------------------------
         */
        Route::resource('service_labels', 'ServiceLabelsController');
        Route::get('all_service_labels', 'ServiceLabelsController@allServiceLabels');

        /*
        |--------------------------------------------------------------------------
        | 精品推荐管理
        |--------------------------------------------------------------------------
        */
        Route::resource('recommends', 'RecommendsController');
        //获取楼盘下拉数据
        Route::get('buildings_select', 'RecommendsController@buildingsSelect');

        /*
        |--------------------------------------------------------------------------
        | pc端精品推荐管理
        |--------------------------------------------------------------------------
        */
        Route::resource('pc_recommends', 'PcRecommendsController');

        /*
        |--------------------------------------------------------------------------
        | 系统公告管理
        |--------------------------------------------------------------------------
        */
        Route::resource('system_notices', 'SystemNoticesController');

        /*
        |--------------------------------------------------------------------------
        | 热门商圈管理
        |--------------------------------------------------------------------------
        */
        Route::resource('hot_blocks', 'HotBlocksController');

        /*
        |--------------------------------------------------------------------------
        | 楼盘推荐管理
        |--------------------------------------------------------------------------
        */
        Route::resource('building_recommends', 'BuildingRecommendsController');

        /*
        |--------------------------------------------------------------------------
        | 推荐服务管理
        |--------------------------------------------------------------------------
        */
        Route::resource('service_recommends', 'ServiceRecommendsController');
        // 服务下来数据
        Route::get('service_select', 'ServiceRecommendsController@serviceSelect');

        /*
        |--------------------------------------------------------------------------
        | 楼盘特色管理
        |--------------------------------------------------------------------------
        */
        Route::resource('building_features', 'BuildingFeaturesController');

        /*
        |--------------------------------------------------------------------------
        | 楼盘管理
        |--------------------------------------------------------------------------
        */
        Route::resource('buildings', 'BuildingsController');
        // 添加楼盘标签
        Route::post('add_building_label', 'BuildingsController@addBuildingLabel');
        // 楼盘特色下拉数据
        Route::get('building_feature_list', 'BuildingsController@buildingFeatureList');
        /*
        |--------------------------------------------------------------------------
        | 房源管理
        |--------------------------------------------------------------------------
        */
        Route::resource('houses', 'HousesController');
        //房源上架
        Route::post('show_house', 'HousesController@showHouse');
        //房源下架
        Route::get('del/{id}', 'HousesController@del');

        /*
        |--------------------------------------------------------------------------
        | 推荐商圈管理
        |--------------------------------------------------------------------------
        */
        // 推荐商圈列表数据
        Route::get('all_building_blocks', 'BlocksController@allBuildingBlock');
        // 商圈添加推荐
        Route::post('add_recommend/{id}', 'BlocksController@addRecommend');
        // 获取所有商圈基础地理位置
        Route::get('block_locations', 'BlocksController@blockLocations');
        /*
        |--------------------------------------------------------------------------
        | 商圈管理
        |--------------------------------------------------------------------------
        */
        //
        Route::resource('blocks', 'BlocksController');
        /*
        |--------------------------------------------------------------------------
        | 系统日志管理
        |--------------------------------------------------------------------------
         */
        Route::resource('sys_logs', 'SysLogController');

        //消息类型管理
        Route::resource('message_types', 'MessageTypesController');

        //消息发送管理
        Route::resource('accept_message', 'AcceptMessagesController');
        //获取员工下拉数据
        Route::get('select_users', 'AcceptMessagesController@getSelectUsers');

        //获取绑定消息的员工
        Route::get('get_binding/{type}', 'AcceptMessagesController@getBinding');


        //生成二维码
        Route::post('code', 'EmployeesController@code');

        //慢查询
        Route::post('query', 'QueryController@create');

        /*
        |--------------------------------------------------------------------------
        | App,Android版本管理
        |--------------------------------------------------------------------------
        */
        Route::resource('app_android', 'AppAndroidController');


        /*
        |--------------------------------------------------------------------------
        | 资讯管理
        |--------------------------------------------------------------------------
        */
        Route::resource('information', 'InformationController');
        Route::get('set_top/{id}', 'InformationController@setTop');
        Route::get('del_top/{id}', 'InformationController@delTop');
        // 爬取安居客资讯信息
        Route::post('pick_information', 'InformationController@pickInformation');

        /*
        |--------------------------------------------------------------------------
        | pc端推荐服务管理
        |--------------------------------------------------------------------------
        */
        Route::resource('pc_service_recommends', 'PcServiceRecommendsController');

        //pc端企业服务
        Route::resource('pc_enterprise_services', 'PcEnterpriseServicesController');

        /*
        |--------------------------------------------------------------------------
        | 商城标签管理
        |--------------------------------------------------------------------------
        */
        //商城大类管理
        Route::resource('categories','CategoriesController');
        // 标签
//        Route::resource('labels', 'LabelsController');
        // 通过大类获取一级标签
        Route::get('get_parent_by_category/{id}', 'LabelsController@getParentByCategory');

        /*
        |--------------------------------------------------------------------------
        | 绿植租摆
        |--------------------------------------------------------------------------
        */
        Route::resource('plants','PlantsController');

        /*
        |--------------------------------------------------------------------------
        | 办公设备
        |--------------------------------------------------------------------------
        */
        Route::resource('computers','ComputersController');

        /*
        |--------------------------------------------------------------------------
        | 办公家具
        |--------------------------------------------------------------------------
        */
        Route::resource('furniture','FurnitureController');

        //投放、预约
        Route::resource('entrust_throw_ins', 'EntrustThrowInsController');
        //渠道数据统计
        Route::get('statistics', 'EntrustThrowInsController@statistic');
        //转化率
        Route::get('conversion_rates', 'EntrustThrowInsController@conversionRate');
        //渠道来源构成
        Route::get('constitute_data', 'EntrustThrowInsController@constituteData');

        //回访
        Route::post('survey', 'EntrustThrowInsController@survey');
        //添加工单
        Route::post('add_gd', 'EntrustThrowInsController@addGd');
        // 管理员分配工单
        Route::get('allocation','WorkOrderController@allocation');
        // 确认收到工单
        Route::get('confirm','WorkOrderController@confirm');
        // 获取给人员分配工单下拉数据
        Route::get('get_all_distribution','WorkOrderController@getAllDistribution');
    });




});