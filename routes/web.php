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

Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
    //Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
});




// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
