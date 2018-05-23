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
// 忘记密码
Route::get('forget_pwd', 'LoginsController@forgetPwd');
// 找回密码
Route::post('retrieve_pwd', 'LoginsController@retrievePwd');

// 楼盘列表页
Route::resource('buildings', 'BuildingController');
//精选楼盘
Route::resource('recommends', 'RecommendController');
//预约
Route::resource('bespeaks', 'BespeakController');
//房源投放
Route::resource('throw_ins', 'ThrowInController');
// 房源详情页
Route::resource('houses', 'HouseController');


// 服务
Route::resource('servers', 'ServerController');
// 地图
Route::get('map', 'ServerController@map');

// 服务
Route::resource('servers', 'ServerController');

Route::group(['middleware' => ['web','weChat.login']], function () {
    // 退出
    Route::get('logout', 'LoginsController@logout');

    /*
    |--------------------------------------------------------------------------
    | 重置基本信息
    |--------------------------------------------------------------------------
    */
    // 修改密码视图
    Route::get('revise_password', 'ResetInfoController@revisePwd');
    // 修改密码
    Route::post('reset_pwd', 'ResetInfoController@resetPwd');

    // 换绑手机号(旧手机号验证视图) 验证原号码
    Route::get('old_tel_validate_view', 'ResetInfoController@oldTelValidateView');

    // 换绑手机号(旧手机号验证) 修改号码
    Route::post('old_tel_validate', 'ResetInfoController@oldTelValidate');

    // 换绑手机操作视图
    Route::get('reset_tel_view', 'ResetInfoController@resetTelView');
    // 换绑手机操作
    Route::post('reset_tel', 'ResetInfoController@resetTel');
    // 投放房源
    Route::get('user_house_resources', 'ResetInfoController@resources');
    // 用户首页
    Route::resource('user', 'UserController');
    // 委托找房
    Route::get('user_find_house', 'ResetInfoController@findHouse');
    // 关于我们
    Route::get('user_about_us', 'ResetInfoController@aboutUs');
    // 个人设置
    Route::get('user_setting', 'ResetInfoController@setting');



    /*
    |--------------------------------------------------------------------------
    | 浏览记录
    |--------------------------------------------------------------------------
    */
    Route::resource('browse_records', 'BrowseRecordsController');

    /*
    |--------------------------------------------------------------------------
    | 收藏
    |--------------------------------------------------------------------------
    */
    Route::resource('collections', 'CollectionsController');

});
Route::get('map', 'ServerController@map');

