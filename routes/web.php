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

// 楚楼网官网
Route::group(['domain' => config('hosts.home'), 'namespace' => 'Pc'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/home.php');
});
// 楚楼网官网
Route::group(['domain' => config('hosts.mall'), 'namespace' => 'Mall'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/mall.php');
});
// 商城小功能列表详情页
Route::get('list_charge',function(){
    return view('shop.list_charge');
});
Route::get('list_register',function(){
    return view('shop.list_register');
});
Route::get('list_clean',function(){
    return view('shop.list_clean');
});
Route::get('list_ressetClean',function(){
    return view('shop.list_ressetClean');
});