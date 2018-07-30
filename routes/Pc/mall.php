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
// 综合布线
Route::get('/wiring', 'CompanyDecoratController@wiring');

// 企业服务
Route::resource('entrust_throw_ins', 'EntrustThrowInsController');

// 工商财税/ 公司注册
Route::resource('business_taxes', 'BusinessTaxesController');

// 室内环保服务 保洁服务
Route::get('cleanup', 'EntryServiceController@index');

// 桶装水
Route::get('water', 'EntryServiceController@water');
// 搬家
Route::get('houseMv', 'EntryServiceController@houseMv');
