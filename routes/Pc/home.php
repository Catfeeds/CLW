<?php
// 前台首页
Route::resource('/', 'IndexController');

// 楼盘
Route::resource('buildings', 'BuildingsController');

//房源详情
Route::resource('office_building_houses', 'OfficeBuildingHousesController');

//资讯
Route::resource('information','InformationsController');

//登录
Route::resource('logins','LoginsController');

//退出登录
Route::get('logout','LoginsController@logout');

//获取手机验证码
Route::get('sms/captcha/{tel}/{tmp}', 'LoginsController@smsCode');

// 楼盘列表视图页
Route::get('building_list', 'BuildingsController@buildingList');

Route::get('building_search', 'BuildingsController@buildingSearch');

//PC端委托找房
Route::resource('bespeaks', 'BespeaksController');
//PC端房源投放
Route::resource('throw_ins', 'ThrowInsController');

// 获取指定gps周边楼盘
Route::post('get_periphery_buildings','MapsController@getPeripheryBuildings');
// 获取地铁站点楼盘数量
Route::post('get_periphery_buildings_count','MapsController@getPeripheryBuildingsCount');

// 获取区域地理位置信息
Route::get('get_area_locations_list','MapsController@getAreaLocationsList');
// 获取商圈地理位置信息
Route::get('get_block_locations_list','MapsController@getBlockLocationsList');

//收藏
Route::resource('collections', 'CollectionsController');
//房源详情取消收藏
Route::get('del/{id}', 'CollectionsController@del');
//精选专题
Route::get('topic',function(){
  return view('home.home_topic');
});
//浏览记录管理
Route::resource('browse_records','BrowseRecordsController');


