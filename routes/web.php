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
Route::get('homepage',function(){
    return view('home.homepage');
});
//app下载页面
Route::get('download',function(){
    return view('home.download');
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