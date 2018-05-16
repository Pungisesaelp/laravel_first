<?php
//    Route::get('/', 'PagesController@about');
    Route::get('about', 'PagesController@about');
    Route::get('contact', 'PagesController@contact');
//Маршрут для получения статей
    Route::resource('articles', 'ArticlesController');

    Auth::routes();

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('foo', ['middleware' => 'manager', function () {
    return 'Эта страница только для менеджеров';
    }]);