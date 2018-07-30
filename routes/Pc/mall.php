<?php
Route::get('/', 'IndexController@index');

// 绿植租摆
Route::resource('/plants', 'PlantsController');
// 电脑租售
Route::resource('/computers', 'ComputersController');
// 家具
Route::resource('/furniture', 'FurnitureController');
// 企业选址
Route::resource('/companySiteSelect', 'CompanySiteSelectController');
// 企业装修
Route::resource('/companyDecorat', 'CompanyDecoratController');

//企业服务
Route::resource('entrust_throw_ins', 'EntrustThrowInsController');