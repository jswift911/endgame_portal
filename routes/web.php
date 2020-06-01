<?php


// Главная
Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
});


// Admin (profile)
Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
    Route::get('/', 'DashboardController@dashboard')->name('profile');


    //----Меню----//

    //admin/profile/control-menu
    Route::match(['GET', 'POST'],'/menu-control', 'ControlController@indexMenu')->name('menu-control');
    //admin/profile/add-menu
    Route::match(['GET', 'POST'],'/add-menu', ['uses'=>'ControlController@indexAddMenu','as'=>'menuAdd']);
    //admin/profile/menu/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/menu/edit/{menu}', ['uses'=>'ControlController@indexEditMenu','as'=>'menuEdit']);

    //----Слайдер----//

    //admin/profile/control-slider
    Route::match(['GET', 'POST'],'/slider-control', 'ControlController@indexSlider')->name('slider-control');
    //admin/profile/add-slider
    Route::match(['GET', 'POST'],'/add-slider', ['uses'=>'ControlController@indexAddSlider','as'=>'sliderAdd']);
    //admin/profile/slider/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/slider/edit/{slider}', ['uses'=>'ControlController@indexEditSlider','as'=>'sliderEdit']);

    //----Интро----//

    //admin/profile/control-intro
    Route::match(['GET', 'POST'],'/intro-control', 'ControlController@indexIntro')->name('intro-control');
    //admin/profile/add-intro
    Route::match(['GET', 'POST'],'/add-intro', ['uses'=>'ControlController@indexAddIntro','as'=>'introAdd']);
    //admin/profile/intro/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/intro/edit/{intro}', ['uses'=>'ControlController@indexEditIntro','as'=>'introEdit']);

});


// Auth
Auth::routes();

// Steam
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');

Route::get('steamlogin', 'AuthController@handle');
Route::get('steamlogout', 'AuthController@getLogout')->name('steamlogout');