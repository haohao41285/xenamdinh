<?php

Route::get('/','PageController@index')->name('frontend.index');
//take pages
Route::get('/{theme}', 'PageController@show')->name('frontend.show');
//detail news
Route::get('detail/{slug}','NewsController@detail')->name('frontend.detail.news');
// Search cars
Route::post('search/{slug}','PageController@search')->name('frontend.xe.search');
//contact
Route::post('contact','PageController@contact')->name('frontend.contact');


//News_customer//detail works
Route::group(['middleware' => 'auth:customer'], function() {

    Route::get('{id}/update','WorkController@update')->name('frontend.work.update');
    Route::post('update-work/{id}','WorkController@updateWork')->name('frontend.work');
    Route::get('{id}/delete','WorkController@delete')->name('frontend.work.delete');
    Route::post('post/news','NewsController@postNews')->name('frontend.post.news');
    Route::get('delete/news/{id}','NewsController@delete')->name('frontend.news.delete');
});

//cart
Route::group(['prefix' => 'ticket'], function() {

    Route::post('/add','CartController@add')->name('frontend.ticket.add');

    Route::get('/checkout','CartController@getCart')->name('frontend.ticket');

    Route::post('/update','CartController@update')->name('frontend.ticket.update');

    Route::post('/book','CartController@book')->name('frontend.ticket.book');

    Route::post('/remove','CartController@remove')->name('frontend.ticket.remove');

    Route::get('/destroy','CartController@destroy')->name('frontend.ticket.destroy');
    
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