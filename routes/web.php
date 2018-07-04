<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/user_agreement', 'HomeController@agreement');
// TODO zxz地图功能开发路由
Route:: get('map_test', function () {
    return view('test.mapDemo');
});
//首页
Route::get('index',function(){
    return view('home.index');
});
//登录页面
Route::get('login',function(){
    return view('home.login');
});
//注册界面
Route::get('register',function(){
    return view('home.register');
});
//app下载页面
Route::get('download',function(){
    return view('home.download');
});
//个人中心页面
Route::get('personal',function(){
    return view('home.personal');
});
//房源列表页面
Route::get('house_list',function(){
    return view('home.house_list');
});
//投放房源页面
Route::get('sellhouse',function(){
    return view('home.sellhouse');
});
/*
 * 微信端路由
 */

Route::group(['domain' => config('hosts.we'), 'namespace' => 'We'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/we.php');
});

//业务员
Route::get('work_order_salesman', 'We\WorkOrderController@salesman');

// 店长
Route::get('work_order_shopowner', 'We\WorkOrderController@shopwner');

// 楚楼网官网
Route::group(['domain' => config('hosts.home'), 'namespace' => 'Pc'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/home.php');
});
// 楚楼网商城
Route::group(['prefix' => 'mall', 'namespace' => 'Mall'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/mall.php');
});