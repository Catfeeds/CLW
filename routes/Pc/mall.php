<?php
Route::get('/', 'IndexController@index');


Route::resource('/plants', 'PlantsController');