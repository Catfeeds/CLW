<?php
// 前台首页
Route::resource('/', 'IndexController');

// 楼盘
Route::resource('buildings', 'BuildingsController');

//房源详情
Route::resource('office_building_houses', 'OfficeBuildingHousesController');


//资讯
Route::resource('information','InformationsController');

//登录页面
Route::resource('logins','LoginsController');

//退出登录
Route::get('logout','LoginsController@logout');

//注册
Route::resource('registers', 'RegistersController');
//生成验证码
Route::get('captcha/{tmp}','RegistersController@captcha');
//获取手机验证码
Route::get('/sms/captcha/{tel}/{tmp}/{code}', 'RegistersController@getSmsCode');

//PC端委托找房
Route::resource('bespeaks', 'BespeaksController');
//PC端房源投放
Route::resource('throw_ins', 'ThrowInsController');

