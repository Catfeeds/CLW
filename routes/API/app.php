<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/5/4
 * Time: 下午3:37
 */
Route::group(['namespace' => 'App', 'prefix' => 'app'], function () {
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
});