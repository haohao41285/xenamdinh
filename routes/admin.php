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
Route::group(['prefix'=>'admin/'],function(){
	Auth::routes();
	Route::get('dashboard',function(){
		return view('admin.dashboard');
	});
	//Route::get('news','NewsController@viewNews')->name('admin.view-news');
	Route::get('news',function(){
		return view('admin.news.news');
	});
	Route::get('news/edit',function(){
		return view('admin.news.news-edit');
	});
});

