<?php
// we.clw.com
// 首页
Route::get('/', 'IndexController@index');
// 楼盘列表页
Route::resource('buildings', 'BuildingController');
// 房源详情页
Route::resource('houses', 'HouseController');
// 用户相关
