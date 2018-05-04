<?php
/**
 * Created by PhpStorm.
 * User: luozhen
 * Date: 2018/3/12
 * Time: 上午11:54
 */
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {


    Route::resource('/test', 'TestController');
    Route::resource('/banner','BannerController');

});