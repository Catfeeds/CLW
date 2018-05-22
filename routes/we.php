<?php
// we.clw.com

// 首页
Route::get('/', 'IndexController@index');
// 获取手机验证码
Route::get('/sms/captcha/{tell}/{tmp}', 'RegistersController@getSmsCode');

// 注册
Route::resource('registers', 'RegistersController');

// 楼盘列表页
Route::resource('buildings', 'BuildingController');
// 房源详情页
Route::resource('houses', 'HouseController');
// 用户相关
