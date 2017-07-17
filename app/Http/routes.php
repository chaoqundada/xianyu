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
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'login'],function(){

    //管理员路由 
    Route::controller('notic','NoticController');
    //后台首页(登录才能用)
    Route::get('index/show','IndexController@show');
    //config 配置页面
	Route::controller('config','ConfigController');
	//links 友情链接
	Route::controller('links','LinksController');

	// 后台轮播图片上传
	Route::post('upload','UplodaController@upload');
	// 后台轮播路由
	Route::controller('slide','SlideController');
	// 后台排序
	Route::any('changeorder/{id}','ChangeorderController@changeOrder');
	//后台导航路由
	Route::controller('nav','NavController');
	//后台管理前台用户
	Route::controller('homeuser','HomeuserController');
});

//后台鱼塘
Route::controller('/admin/fishpond','Admin\FishpondController');
//后台商品分类路由
	Route::controller('/admin/tgoods','Admin\TgoodsController');
	//后台商品路由
	Route::controller('/admin/goods','Admin\GoodsController');

//后台权限管理组
Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>['login','admin']],function(){
	Route::controller('user','UserController');
});

//前台操作
	//主页面
	Route::get('/','Home\IndexController@index');
	//注册
	Route::controller('/user','Home\UserController');
	//登录
	Route::controller('/login','Home\LoginController');
	//前台商品路由
	Route::controller('/goods','Home\GoodsController');
	// 收藏
	Route::controller('/home/user_coll','Home\User_collController');
	//导航
	Route::controller('/nav','Home\NavController');
	// 轮播
	//Route::controller('slide','Home\SlideController');

	//地址
	Route::controller('/addr','Home\AddrController');
	//安全设置
	Route::controller('/pass','Home\PassController');
	//订单操作
	Route::controller('/order','Home\OrderController');
	//举报显示
	Route::controller('/report','Home\ReportController');

	//我的鱼塘
	Route::controller('/myfishpond','Home\MyfishpondController');
	//鱼塘展示
    Route::controller('/fishpond','Home\FishpondController');

    //前台搜索功能
    Route::get('/search','Home\IndexController@search');


