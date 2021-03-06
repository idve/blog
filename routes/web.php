<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//前台路由
Route::get('/', 'BlogController@index');
Route::get('/login', 'LoginController@index');
Route::get('/loginOut', 'LoginController@loginOut');
Route::post('/login/post', 'LoginController@post');
Route::get('/regist', 'RegistController@index');
Route::get('/article', 'BlogController@showArticleList');



//添加文章展示页
Route::get('/article/add', 'BlogController@addArticle');


//保存分类
Route::post('/cate/store','BlogController@storeCate');
//保存文章
Route::post('/article/store', 'BlogController@storeArticle');
//修改文章
Route::put('/article/store', 'BlogController@storeArticle');

//编辑文章
Route::get('/article/{id}/edit', 'BlogController@editArticle');
//删除文章
Route::get('/article/{id}/delete', 'BlogController@delArticle');

Route::get('/article/{id}', 'BlogController@showArticleDetail');

//相册路由
Route::get('/photo/{cid}', 'PhotoController@index');
//s上传图片
Route::post('/photo/upload', 'PhotoController@upload');
//修改图片的描述
Route::post('/photo/update/{id}', 'PhotoController@update');

Route::get('/photo/show/{id}', 'PhotoController@show');

//后台路由
