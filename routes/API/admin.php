<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
header('Access-Control-Allow-Headers:X-Token,Content-Type,Authorization,safeString');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    // 安全验证码
    Route::get('get_safe_string', 'BannerController@safeString');


    // 登录
    Route::resource('logins','LoginsController');

    // 安全验证
    Route::group(['middleware' => 'safe.validate'], function () {
        //根据类型获取接收人人员openid
        Route::get('get_openid/{type}', 'AcceptMessagesController@getOpenid');

        //通过电话获取openid
        Route::get('get_openid_by_tel', 'EmployeesController@getOpenidByTel');

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
        //获取消息下拉数据
//        Route::get('select_type', 'AcceptMessagesController@getSelectType');
        //获取员工下拉数据
        Route::get('select_users', 'AcceptMessagesController@getSelectUsers');

        //获取绑定消息的员工
        Route::get('get_binding/{type}', 'AcceptMessagesController@getBinding');



        //获取员工没有绑定的消息类型
//        Route::get('get_un_type/{id}', 'AcceptMessagesController@getUnType');


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


        /*
        |--------------------------------------------------------------------------
        | pc端推荐服务管理
        |--------------------------------------------------------------------------
        */
        Route::resource('pc_service_recommends', 'PcServiceRecommendsController');

        //pc端企业服务
        Route::resource('pc_enterprise_services', 'PcEnterpriseServicesController');
    });

});