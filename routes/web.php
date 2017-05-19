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
Route::get('/', function () {
    return redirect('/home');
});
Route::get('home', 'BlogController@index');
Route::get('/login', 'LoginController@index');
Route::get('/loginOut', 'LoginController@loginOut');
Route::post('/login/post', 'LoginController@post');
Route::get('/regist', 'RegistController@index');
Route::get('home/article', 'BlogController@showArticleList');

//添加文章展示页
Route::get('home/article/add', 'BlogController@addArticle');
//添加文章保存
Route::get('home/article/add', 'BlogController@addArticle');
Route::post('home/article/store', 'BlogController@storeArticle');
Route::any('home/uploadkindeditor', 'EditorController@upload');



Route::get('home/article/{slug}', 'BlogController@showArticleDetail');

//后台路由
