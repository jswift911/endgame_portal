<?php


// Главная
Route::group([], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'IndexController@execute','as'=>'index']);
});


// Контакты
Route::get('/page/Contacts', ['uses'=>'MenuController@contacts','as'=>'contacts']);

// Подменю
Route::get('/page/Game-Single', ['uses'=>'MenuController@single','as'=>'single']);

// Меню (страницы остальные динамические)
Route::group(['prefix' => 'page'], function () {
    Route::match(['GET', 'POST'], '/{page}',['uses'=>'MenuController@execute','as'=>'page']);
});

// Категории (Games, Reviews, Playstation)
Route::group(['prefix' => 'category'], function () {
    Route::match(['GET', 'POST'], '/{category}',['uses'=>'CategoryController@execute','as'=>'category']);
});

// Одна игра
Route::group(['prefix' => 'game'], function () {
    Route::match(['GET', 'POST'], '/{game}',['uses'=>'GameController@execute','as'=>'game']);
});

// Features блок
Route::group(['prefix' => 'features'], function () {
    Route::match(['GET', 'POST'], '/',['uses'=>'FeaturesController@execute','as'=>'features']);
});




// Admin (profile)
Route::group(['prefix' => 'profile', 'namespace' => 'Admin', 'middleware' => ['auth'] ], function () {
    Route::get('/', 'DashboardController@dashboard')->name('profile');


    //----Меню----//

    //admin/profile/menu-control
    Route::match(['GET', 'POST'],'/menu-control', 'ControlController@indexMenu')->name('menu-control');
    //admin/profile/add-menu
    Route::match(['GET', 'POST'],'/add-menu', ['uses'=>'ControlController@indexAddMenu','as'=>'menuAdd']);
    //admin/profile/menu/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/menu/edit/{menu}', ['uses'=>'ControlController@indexEditMenu','as'=>'menuEdit']);

    //----Слайдер----//

    //admin/profile/slider-control
    Route::match(['GET', 'POST'],'/slider-control', 'ControlController@indexSlider')->name('slider-control');
    //admin/profile/add-slider
    Route::match(['GET', 'POST'],'/add-slider', ['uses'=>'ControlController@indexAddSlider','as'=>'sliderAdd']);
    //admin/profile/slider/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/slider/edit/{slider}', ['uses'=>'ControlController@indexEditSlider','as'=>'sliderEdit']);

    //----Интро----//

    //admin/profile/intro-control
    Route::match(['GET', 'POST'],'/intro-control', 'ControlController@indexIntro')->name('intro-control');
    //admin/profile/add-intro
    Route::match(['GET', 'POST'],'/add-intro', ['uses'=>'ControlController@indexAddIntro','as'=>'introAdd']);
    //admin/profile/intro/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/intro/edit/{intro}', ['uses'=>'ControlController@indexEditIntro','as'=>'introEdit']);

    //----Блог----//

    //admin/profile/blog-control
    Route::match(['GET', 'POST'],'/blog-control', 'ControlController@indexBlog')->name('blog-control');
    //admin/profile/add-blog
    Route::match(['GET', 'POST'],'/add-blog', ['uses'=>'ControlController@indexAddBlog','as'=>'blogAdd']);
    //admin/profile/blog/edit/2
    Route::match(['GET', 'POST', 'DELETE'], '/blog/edit/{blog}', ['uses'=>'ControlController@indexEditBlog','as'=>'blogEdit']);

    //----Видео----//

    //admin/profile/video-control
    Route::match(['GET', 'POST'],'/video-control', 'ControlController@indexVideo')->name('video-control');
    //admin/profile/video/edit/2
    Route::match(['GET', 'POST'], '/video/edit/{video}', ['uses'=>'ControlController@indexEditVideo','as'=>'videoEdit']);

    //----Features----//

    //admin/profile/feature-control
    Route::match(['GET', 'POST'],'/feature-control', 'ControlController@indexFeature')->name('feature-control');
    //admin/profile/feature/edit/2
    Route::match(['GET', 'POST'], '/feature/edit/{feature}', ['uses'=>'ControlController@indexEditFeature','as'=>'featureEdit']);

});


// Auth
Auth::routes();

// Steam
Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');

Route::get('steamlogin', 'AuthController@handle');
Route::get('steamlogout', 'AuthController@getLogout')->name('steamlogout');