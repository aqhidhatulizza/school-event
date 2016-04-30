<?php

Route::get('/', ['as' => 'page.calendar', function () {
    return view('pages.index');
}]);
Route::get('/user', ['as' => 'page.users', function () {
    return view('pages.users');
}]);
Route::get('/klien', ['as' => 'page.klien', function () {
    return view('pages.klien');
}]);
Route::get('/event', ['as' => 'page.event', function () {
    return view('pages.event');
}]);
Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('event', 'EventController');
    Route::get('list-event', ['as' => 'api.v1.list.event', 'uses' => 'EventController@listEvent']);
    Route::resource('users', 'UsersController');
    Route::get('list-users', ['as' => 'api.v1.list.users', 'uses' => 'UsersController@listusers']);
    Route::resource('klien', 'KlienController');
    Route::get('list-klien', ['as' => 'api.v1.list.klien', 'uses' => 'KlienController@listKlien']);
});

