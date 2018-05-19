<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    // 七牛token
    Route::get('/get_qi_niu_token', 'BannerController@token');

    // 登录
    Route::resource('logins','LoginsController');

    // 退出
    Route::post('logout','LoginsController@logout');
//    Route::group(['middleware' => 'apiAuth:admin'], function () {

        Route::resource('banners','BannerController');
//    });

    /*
    |--------------------------------------------------------------------------
    | 管理员
    |--------------------------------------------------------------------------
    */
    Route::resource('admins','AdminsController');

    /*
    |--------------------------------------------------------------------------
    | banner管理
    |--------------------------------------------------------------------------
    */
//    Route::resource('banners','BannerController');

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
    | 房源特色管理
    |--------------------------------------------------------------------------
    */
    Route::resource('house_features', 'HouseFeaturesController');

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
    Route::get('del', 'HousesController@del');

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
});