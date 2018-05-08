<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/5/4
 * Time: 下午3:37
 */
Route::group(['namespace' => 'App', 'prefix' => 'app'], function () {

    // 获取手机验证码
    Route::get('/sms/captcha/{tell}/{tmp}', 'RegistersController@getSmsCode');

    // 注册
    Route::resource('/registers', 'RegistersController');

    // 登录
    Route::resource('/logins', 'LoginsController');
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
    /*
    |--------------------------------------------------------------------------
    | 预约
    |--------------------------------------------------------------------------
    */
    Route::resource('bespeaks', 'BespeaksController');
    /*
    |--------------------------------------------------------------------------
    | 区域
    |--------------------------------------------------------------------------
    */
    Route::resource('areas', 'AreasController');
    // 获取对应区域下的商圈
    Route::get('block_list/{area_id}', 'AreasController@BlockList');
    //楼盘详情
    Route::resource('buildings', 'BuildingsController');
    //写字楼详情
    Route::get('buildings_office/{id}','BuildingsController@showOffice');

});