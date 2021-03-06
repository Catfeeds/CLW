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


// 工单(手机端页面)
Route::resource('work_orders', 'We\WorkOrderController');

// 楚楼网官网
Route::group(['domain' => config('hosts.home'), 'namespace' => 'Pc'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/home.php');
});
// 楚楼网商城
Route::group(['domain' => config('hosts.mall'), 'namespace' => 'Mall'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/Pc/mall.php');
});
/*
 * 微信端路由
 */

Route::group(['domain' => config('hosts.we'), 'namespace' => 'We'], function () {
    \Composer\Autoload\includeFile(__DIR__ . '/we.php');
});
// 台式机测试路由
Route::get('desktop_pc', function(){
    return view('shop.desktop_pc');
});
Route::get('tex_plant', function(){
    return view('shop.tex_plant');
});