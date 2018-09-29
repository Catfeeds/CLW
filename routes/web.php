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
// 工单详情
Route::get('work_order_detail', 'We\WorkOrderController@detail');
// 楚楼网官网
Route::group(['domain' => config('hosts.home'), 'namespace' => 'Pc'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/home.php');
});
// 楚楼网官网
Route::group(['domain' => config('hosts.mall'), 'namespace' => 'Mall'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/mall.php');
});
// 台式机测试路由
Route::get('desktop_pc', function(){
    return view('shop.desktop_pc');
});
Route::get('tex_plant', function(){
    return view('shop.tex_plant');
});