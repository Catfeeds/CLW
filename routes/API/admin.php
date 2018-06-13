<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::resource('media_permissions','MediaPermissionsController');
    Route::get('/media_permissions_group', 'MediaPermissionsController@mediaPermissionsGroup');

    // 七牛token
    Route::get('/get_qi_niu_token', 'BannerController@token');

    // 登录
    Route::resource('logins','LoginsController');

    // 退出
    Route::post('logout','LoginsController@logout');
//    Route::group(['middleware' => 'apiAuth:admin'], function () {
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
        // 推荐商圈
        Route::resource('blocks', 'BlocksController');
        /*
        |--------------------------------------------------------------------------
        | 系统日志管理
        |--------------------------------------------------------------------------
         */
        Route::resource('sys_logs', 'SysLogController');


        //微信服务
        Route::any('wechat', 'WechatController@index');

        //二维码
        Route::get('create_qrcode', 'WechatController@create');
        //自定义菜单
        Route::get('menu', 'WechatController@menu');

        //消息发送管理
        Route::resource('accept_message', 'AcceptMessagesController');

        Route::get('select_users', 'AcceptMessagesController@getSelectUsers');

        //慢查询
        Route::post('query', 'QueryController@create');
//    });

});