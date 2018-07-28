<?php
Route::get('/', 'IndexController@index');

// 绿植租摆
Route::resource('/plants', 'PlantsController');
// 电脑租售
Route::resource('/computers', 'ComputersController');