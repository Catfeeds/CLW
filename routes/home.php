<?php

// 前台首页
Route::resource('/', 'IndexController');

// 楼盘
Route::resource('buildings', 'BuildingsController');

//房源详情
Route::resource('house', 'OfficeBuildingHousesController');