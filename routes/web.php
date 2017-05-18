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



//短信验证码
Route::get('msgcode','CodeController@msgCode');
//图形验证码
Route::get('graphcode','CodeController@graphCode');

//用户注册页
Route::resource('register','Home\UserController@create');
//创建用户
Route::resource('create','Home\UserController@store');
//用户登录
Route::resource('login','Home\LoginController');


//重置密码
Route::resource('resetpassword','Home\ResetpasswordController');