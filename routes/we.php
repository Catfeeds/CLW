<?php
// we.clw.com

Route::get('/', 'IndexController@index');

// 获取手机验证码
Route::get('/sms/captcha/{tell}/{tmp}', 'RegistersController@getSmsCode');