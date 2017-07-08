<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台操作
Route::get('/admin',function()
	{
		return redirect('/admin/login/login');
	});
//后台登录路由
Route::controller('/admin/login','Admin\LoginController');
//验证码路由
Route::get('/code','Model\CodeController@code');

//后台路由组
Route::group([],function(){
    //管理员路由
    Route::controller('/admin/user','Admin\UserController');


});




	//后台主页面
Route::controller('/admin/index','Admin\IndexController');

//后台鱼塘
Route::controller('/admin/fishpond','Admin\FishpondController');




//前台操作

	//主页面
	Route::get('/','Home\IndexController@index');
	//注册
	Route::controller('/user','Home\UserController');
	//登录
	Route::controller('/login','Home\LoginController');
	//地址
	Route::controller('/addr','Home\AddrController');

	//我的鱼塘
	Route::controller('/myfishpond','Home\MyfishpondController');

	//鱼塘展示
    Route::controller('/fishpond','Home\FishpondController');
