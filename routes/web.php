<?php


Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
    //Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
});


// Admin (profile)
Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
    Route::get('/', 'DashboardController@dashboard')->name('profile');
//    Route::resource('/category', 'CategoryController', ['as'=>'admin']);
});


// Auth
Auth::routes();

// Steam
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');

Route::get('steamlogin', 'AuthController@handle');
Route::get('steamlogout', 'AuthController@getLogout');