<?php
// we.clw.com

// 首页
Route::get('/', 'IndexController@index');
// 获取手机验证码
Route::get('/sms/captcha/{tell}/{tmp}', 'RegistersController@getSmsCode');

// 注册
Route::resource('registers', 'RegistersController');

// 密码登录
Route::resource('logins', 'LoginsController');
// 快速登录页面
Route::get('quick_login_view', 'LoginsController@quickLoginView');
Route::post('quick_login', 'LoginsController@quickLogin');

// 楼盘列表页
Route::resource('buildings', 'BuildingController');
// 房源详情页
Route::resource('houses', 'HouseController');
// 用户相关
// 用户首页
Route::resource('user', 'UserController');
// 委托找房
Route::get('user_find_house', 'UserController@findHouse');
// 投放房源
Route::get('user_house_resources', 'UserController@resources');
// 关于我们
Route::get('user_about_us', 'UserController@aboutUs');
// 个人设置
Route::get('user_setting', 'UserController@setting');
// 修改密码
Route::get('revise_password', 'UserController@revisePwd');
// 验证原号码
Route::get('revise_phone1', 'UserController@revisePhone1');
// 验证原号码
Route::get('revise_phone2', 'UserController@revisePhone2');
// 服务
Route::resource('servers', 'ServerController');

Route::group(['middleware' => ['web','weChat.login']], function () {

    Route::get('test', function () {
        dd(123);
    });

});
Route::get('map', 'ServerController@map');
