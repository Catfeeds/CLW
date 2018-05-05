<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {


    Route::resource('/test', 'TestController');

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


});