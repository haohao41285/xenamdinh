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

		//NEWS
		Route::group(['prefix'=>'news'],function(){
			Route::get('/','NewsController@viewNews');
			Route::get('/edit',function(){
				return view('admin.news.news-edit');
			});
	    });
		//TRANSPORT
		Route::get('/result/address','TransportController@addressResult')->name('admin.address');

		Route::group(['prefix'=>'transport'],function(){
			Route::get('/','TransportController@index')->name('admin.transport.index');
			Route::get('/datatable','TransportController@datatable')->name('admin.transport.datatable');
			Route::get('/edit/{transport_slug?}/{route?}','TransportController@getEdit')->name('admin.transport.getEdit');
			Route::post('/edit','TransportController@postEdit')->name('admin.transport.postEdit');
			Route::post('/delete','TransportController@delete')->name('admin.transport.delete');
	    });
		//END TRANSPORT

		//ROUTING TRANSPORT
		Route::group(['prefix'=>'routing-transport'],function(){
			Route::get('/','RoutingTransportController@index')->name('admin.routing-transport.index');
			Route::get('/edit/{id?}','RoutingTransportController@getEdit')->name('admin.routing-transport.getEdit');
			Route::post('/edit/','RoutingTransportController@postEdit')->name('admin.routing-transport.postEdit');
			Route::get('/getData/','RoutingTransportController@getData')->name('admin.routing-transport.getData');
			Route::post('/delete','RoutingTransportController@delete')->name('admin.routing-transport.delete');
		});
		//END ROUTING TRANSPORT

		//NEWS CATE
		Route::group(['prefix'=>'news-cate'],function(){
			Route::get('/','NewsCateController@index')->name('admin.news_cate.index');
			Route::get('/edit/{id?}','NewsCateController@getEdit')->name('admin.news_cate.getEdit');
			Route::post('/edit/','NewsCateController@postEdit')->name('admin.news_cate.postEdit');
			Route::get('/getData/','NewsCateController@getData')->name('admin.news_cate.getData');
			Route::post('/delete','NewsCateController@delete')->name('admin.news_cate.delete');
		});
		//END NEWS CATE

		Route::get('setting/information',function(){
		return view('admin.setting.information');
	    });
	});
	
	
});

