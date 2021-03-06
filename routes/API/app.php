<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/5/4
 * Time: 下午3:37
 */
Route::group(['namespace' => 'App', 'prefix' => 'app'], function () {

    // 首页接口
    Route::resource('/', 'IndexController');
    // 获取手机验证码
    Route::get('/sms/captcha/{tell}/{tmp}', 'RegistersController@getSmsCode');

    // 注册
    Route::resource('/registers', 'RegistersController');

    // 登录
    Route::resource('/logins', 'LoginsController');
    Route::get('/user_agreement', 'LoginsController@agreement');
    Route::post('/smsLogin', 'LoginsController@smsLogin');

    Route::group(['middleware' => ['auth:api']], function () {
        // 退出
        Route::post('logout','LoginsController@logout');
        /*
        |--------------------------------------------------------------------------
        | 重置基本信息
        |--------------------------------------------------------------------------
        */
        // 修改密码
        Route::post('reset_pwd', 'ResetInfoController@resetPwd');
        // 换绑手机号(旧手机号验证)
        Route::post('old_tel_validate', 'ResetInfoController@oldTelValidate');
        // 换绑手机操作
        Route::post('reset_tel', 'ResetInfoController@resetTel');

        /*
        |--------------------------------------------------------------------------
        | 收藏
        |--------------------------------------------------------------------------
        */
        Route::resource('collections', 'CollectionsController');
        Route::get('del/{id}', 'CollectionsController@del');
        //用户收藏状态
        Route::get('house_collection/{id}','CollectionsController@houseCollection');

        /*
        |--------------------------------------------------------------------------
        | 浏览记录
        |--------------------------------------------------------------------------
        */
        Route::resource('browse_records', 'BrowseRecordsController');
    });

    /*
    |--------------------------------------------------------------------------
    | 咨询统计
    |--------------------------------------------------------------------------
    */
    Route::resource('consult_tels', 'ConsultTelsController');

    /*
    |--------------------------------------------------------------------------
    | 找回密码
    |--------------------------------------------------------------------------
    */
    Route::resource('retrieve_pwd', 'RetrievePwdController');

    /*
    |--------------------------------------------------------------------------
    | banner
    |--------------------------------------------------------------------------
    */
    Route::resource('banners','BannerController');
    /*
    |--------------------------------------------------------------------------
    | 服务
    |--------------------------------------------------------------------------
    */
    Route::resource('services','ServicesController');
    Route::get('all_services','ServicesController@allService');
    /*
    |--------------------------------------------------------------------------
    | 系统公告
    |--------------------------------------------------------------------------
    */
    Route::resource('system_notices', 'SystemNoticesController');

    /*
    |--------------------------------------------------------------------------
    | 精品推荐
    |--------------------------------------------------------------------------
    */
    Route::resource('recommends', 'RecommendsController');

    /*
    |--------------------------------------------------------------------------
    | 热门商圈
    |--------------------------------------------------------------------------
    */
    Route::resource('hot_blocks', 'HotBlocksController');
    /*
    |--------------------------------------------------------------------------
    | 楼盘推荐
    |--------------------------------------------------------------------------
    */
    Route::resource('building_recommends', 'BuildingRecommendsController');

    //委托找房、投放房源
    Route::resource('entrust_throw_ins', 'WorkOrdersController');
    /*
    |--------------------------------------------------------------------------
    | 区域
    |--------------------------------------------------------------------------
    */
    Route::resource('areas', 'AreasController');
    // 获取对应区域下的商圈
    Route::get('block_list/{area_id}', 'AreasController@BlockList');
    /*
    |--------------------------------------------------------------------------
    | 楼盘详情
    |--------------------------------------------------------------------------
    */
    // 楼盘详情
    Route::resource('buildings', 'BuildingsController');
    // 楼盘下房源类列表
    Route::get('buildings_office/{id}','BuildingsController@showOffice');
    /*
    |--------------------------------------------------------------------------
    | 房源详情
    |--------------------------------------------------------------------------
    */
    // 房源详情
    Route::resource('office_building_houses','OfficeBuildingHousesController');

    // 房源下的周边房源
    Route::get('rim_houses/{id}','OfficeBuildingHousesController@showOffice');

    /*
    |--------------------------------------------------------------------------
    | 推荐服务管理
    |--------------------------------------------------------------------------
    */
    Route::resource('service_recommends', 'ServiceRecommendsController');

    /*
    |--------------------------------------------------------------------------
    | 找房区域搜索添加
    |--------------------------------------------------------------------------
    */
    // 区域搜索条件
    Route::get('block_condition', 'OfficeBuildingHousesController@blockCondition');
    // 其他搜索添加(装修,标签)
    Route::get('other_condition', 'OfficeBuildingHousesController@otherCondition');

    // 版本跟新检查
    Route::resource('check_version', 'CheckVersionController');
});