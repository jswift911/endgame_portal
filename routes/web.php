<?php


Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
    //Route::get('/page/{alias}',['uses'=>'PageController@execute', 'as'=>'page']);
});


// Admin (profile)
Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
    Route::get('/', 'DashboardController@dashboard')->name('profile');


    //----МЕНЮ----//

    //admin/profile/control-menu
    Route::match(['GET', 'POST'],'/menu-control', 'ControlController@indexMenu')->name('menu-control');
    //admin/profile/add-menu
    Route::match(['GET', 'POST'],'/add-menu', ['uses'=>'ControlController@indexAddMenu','as'=>'menuAdd']);
    //admin/profile/menu-control/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/edit/{menu}', ['uses'=>'ControlController@indexEditMenu','as'=>'menuEdit']);

});


// Auth
Auth::routes();

// Steam
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');

Route::get('steamlogin', 'AuthController@handle');
Route::get('steamlogout', 'AuthController@getLogout')->name('steamlogout');