<?php
Route::group(['prefix' => 'mall', 'namespace' => 'Mall'], function(){
    Route::get('/', 'IndexController@index');
});