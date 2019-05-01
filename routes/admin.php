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
	Route::group(['middleware'=>'auth'],function(){
		Route::get('dashboard',function(){
			return view('admin.dashboard');
		});
		Route::get('news',function(){
			return view('admin.news.news');
		});
		Route::get('news/edit',function(){
			return view('admin.news.news-edit');
		});
		//TRANSPORT
		Route::get('transport','TransportController@index')->name('admin.transport.index');
		Route::get('transport/edit/{id?}','TransportController@getEdit')->name('admin.transport.getEdit');
		Route::post('transport/edit','TransportController@postEdit')->name('admin.transport.postEdit');
		//END TRANSPORT

		//ROUTING TRANSPORT
		Route::get('routing-transport','RoutingTransportController@index')->name('admin.routing-transport.index');
		Route::get('routing-transport/edit/{id?}','RoutingTransportController@getEdit')->name('admin.routing-transport.getEdit');
		Route::post('routing-transport/edit/','RoutingTransportController@postEdit')->name('admin.routing-transport.postEdit');
		Route::get('routing-transport/getData/','RoutingTransportController@getData')->name('admin.routing-transport.getData');
		Route::post('routing-transport/delete','RoutingTransportController@delete')->name('admin.routing-transport.delete');
		//END ROUTING TRANSPORT

		Route::get('setting/information',function(){
		return view('admin.setting.information');
	    });
	});
	
	
});

