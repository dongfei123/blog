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

/*Route::get('/', function () {
    return view('welcome');
});
*/

	Route::group(['middleware'=>'adminlogin'],function(){

		//后台首页
		Route::get('/admin/index','AdminController@index');
		//文章模块
		Route::controller('/admin/article','ArticleController');

		//商品模块
		Route::controller('/admin/shop','ShopController');

		//友情链接模块
		Route::controller('/admin/link','LinkController');

		//无限分类
		Route::controller('/admin/cate','CateController');

		//用户模块
		Route::controller('/admin/user','UserController');


		//后台的退出
		Route::get('/admin/logout','AdminController@logout');

	});

	//后台登录
	Route::get('/admin/login','AdminController@login');
		
	//执行登录
	Route::post('/admin/dologin','AdminController@dologin');
	//邮件发送测试
	Route::get('/send','RegisterController@send');
	// //记住用户
	// Route::post('/admin/remember','AdminController@remember');
	
	//验证生日的ajax
	Route::post('/admin/birth','AdminController@birth');

	//删除友情链接的ajax请求
	Route::post('/admin/dlink','AdminController@dlink');


	//前台首页模块
	Route::get('/home/index','IndexController@index');

	//前台添加限时抢的ajax请求
	Route::post('/home/active','IndexController@active');
