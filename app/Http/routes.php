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
		return redirect('/admin/index/index');
	});
	//后台主页面
	Route::controller('/admin/index','Admin\IndexController');
	//管理员路由
	Route::controller('/admin/user','Admin\UserController');
	// Route::controller('/admin/user','Admin\UserController');
	//后台商品分类路由
	Route::controller('/admin/tgoods','Admin\TgoodsController');
	//后台商品路由
	Route::controller('/admin/goods','Admin\GoodsController');




//前台操作
Route::get('/','Home\IndexController@index');
	//前台商品路由
	Route::controller('/goods','Home\GoodsController');
