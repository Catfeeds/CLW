<?php

// 前台首页
Route::resource('/', 'IndexController');


// 楼盘
Route::resource('buildings', 'BuildingsController');