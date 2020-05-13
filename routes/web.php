<?php


Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
    //Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
});




// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
