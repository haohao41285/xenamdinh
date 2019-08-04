<?php

Route::get('/','PageController@index')->name('frontend.index');

Route::post('search/{slug}','PageController@search')->name('frontend.xe.search');
//contact
Route::post('contact','PageController@contact')->name('frontend.contact');

Route::get('news/detail','NewsController@detail')->name('frontend.news.detail');

//TRANSPORT
Route::group(['prefix' => 'transport/'], function() {
    Route::get('list','TransportController@list')->name('frontend.transport.list');
    Route::post('get-data','TransportController@getData')->name('frontend.transport.get-data');
    Route::get('detail/{id?}/{route_id}','TransportController@detail')->name('frontend.transport.detail');
});

//News_customer//detail works
Route::group(['middleware' => 'auth:customer'], function() {

    Route::get('{id}/update','WorkController@update')->name('frontend.work.update');
    Route::post('update-work/{id}','WorkController@updateWork')->name('frontend.work');
    Route::get('{id}/delete','WorkController@delete')->name('frontend.work.delete');
    Route::post('post/news','NewsController@postNews')->name('frontend.post.news');
    Route::get('delete/news/{id}','NewsController@delete')->name('frontend.news.delete');
});


//Auth
Route::group([
	'middleware' => 'guest'],
 function() {
    Route::post('/dang-ki-thanh-vien','AuthController@registry')->name('frontend.registry');
    Route::post('/dang-ki-xe/{xe}','AuthController@registryCar')->name('frontend.registryCar');
    Route::get('/result/address','AuthController@addressResult')->name('frontend.address');
    Route::post('dang-nhap','AuthController@login')->name('frontend.login');
});
Route::group([
	'middleware' => 'auth:customer','prefix'=>'customer'], 
	function() {
    Route::get('/logout','AuthController@logout')->name('frontend.logout');
    Route::get('/{id}','AuthController@infor')->name('frontend.customer.infor');

});

//Login Facebook, Google
Route::get('login/{social}', 'SocialController@redirect')->name('frontend.social');
Route::get('login/{social}/callback', 'SocialController@callback');


