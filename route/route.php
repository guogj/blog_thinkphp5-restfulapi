<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

Route::get(':version/address/:id','api/:version.user/address');  //一般路由规则，

Route::resource(':version/user','api/:version.user');       //资源路由
Route::post(':version/user','api/:version.user/index');
Route::post(':version/token/token','api/:version.token/token');  //生成access_token
Route::post(':version/token/refresh','api/:version.token/refresh');  //刷新access_token
//Route::resource(':version/token','api/:version.token/refresh');




//查询Apiuser
Route::resource(':version/apiuser','api/:version.apiuser');       //资源路由
//Route::get(':version/apiuser','api/:version.apiuser/index');       //apiuser用户
Route::post(':version/apiuser/save','api/:version.apiuser/save');       //添加用户


//获取getAuthentication
Route::resource(':version/getAuthentication/index', 'api/:version.GetAuthentication');
//所有路由匹配不到情况下触发该路由
Route::miss('\app\api\controller\Exception::miss');

//Route::resource(':version/news/data','api/:version.News');
Route::resource(':version/news','api/:version.News');

