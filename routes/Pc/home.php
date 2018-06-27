<?php
// 前台首页
Route::resource('/', 'IndexController');

// 楼盘
Route::resource('buildings', 'BuildingsController');

//房源详情
Route::resource('office_building_houses', 'OfficeBuildingHousesController');
// 房源下的相关房源
Route::get('rim_houses/{id}','OfficeBuildingHousesController@showOffice');

//资讯
Route::resource('information','InformationController');