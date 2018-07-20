<?php

Route::group(['namespace' => 'Mini', 'prefix' => 'mini'], function () {
    Route::get('get_mini_house', 'OfficeBuildingHousesController@getMiniHouse');

    Route::get('get_mini_house_info', 'OfficeBuildingHousesController@getMiniHouseInfo');
});
