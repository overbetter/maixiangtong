<?php

// todo 统计相关 在 statistics.php 路由文件中定义

// todo 中间件要换成正式的，statistics.php 路由文件中的也要一起换
Route::group(['middleware' => 'web'], function () {
    // 用户会话
    Route::get('login', 'SessionsController@create')->name('login');
    Route::post('login', 'SessionsController@store')->name('login');
    Route::delete('logout', 'SessionsController@destroy')->name('logout');

    Route::resource('user', UserController::class); // 用户
});

