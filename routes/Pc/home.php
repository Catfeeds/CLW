<?php

// 前台首页
Route::resource('/', 'IndexController');


// 前台搜索框
Route::get('get_select_info', 'IndexController@getSelectInfo');

// 楼盘
Route::resource('buildings', 'BuildingsController');
// 楼盘详情市场行情
Route::get('market_price/{buildingId}', 'BuildingsController@marketPrice');
// 楼盘详情猜你喜欢
Route::get('like_building', 'BuildingsController@likeBuilding');

//房源详情
Route::resource('office_building_houses', 'OfficeBuildingHousesController');

//房源详情
Route::resource('houses', 'HousesController');

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

//委托找房、投放房源
Route::resource('entrust_throw_ins', 'EntrustThrowInsController');

// 地图找房
Route::get('map_find_house','MapsController@index');
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
// 精选楼盘
Route::resource('pc_recommends', 'PcRecommendsController');
// 关于我们
Route::get('about/{info}', 'AboutWeController@about');
/*
|--------------------------------------------------------------------------
| 个人中心
|--------------------------------------------------------------------------
*/
// 我的预约
Route::get('get_user_bespeaks', 'BespeaksController@getUserBespeaks');
// 浏览记录
Route::resource('browse_records','BrowseRecordsController');
//楼盘浏览列表
Route::get('property_browsing_list','MyBrowsingController@ropertyBrowsingList');
//房源浏览列表
Route::get('listing_list','MyBrowsingController@listingList');