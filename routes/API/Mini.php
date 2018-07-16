<?php

Route::group(['namespace' => 'Mini', 'prefix' => 'mini'], function () {
    Route::get('get_mini_house', 'OfficeBuildingHousesController@getMiniHouse');
});
