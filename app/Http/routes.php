<?php
Route::get('/', ['as' => 'login', 'uses' => 'PageController@getLogin']);
Route::get('/login', ['as' => 'login', 'uses' => 'PageController@getLogin']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'PageController@dashboard']);
Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
Route::get('/user', ['as' => 'user', 'uses' => 'PageController@getemail']);

Route::group(['namespace' => 'Auth', 'prefix' => 'api/v1'], function () {
    Route::get('get-login', 'AuthController@getLogin');
    Route::get('post-login', 'AuthController@getLogin');
    Route::post('post-login', 'AuthController@postLogin');
    Route::get('logout', 'AuthController@getLogout');
});

Route::get('/encrypt', function () {
    return bcrypt('qwerty');
});
Route::get('calendar', ['as' => 'page.calendar', function () {
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
//Route::get('/event', ['as' => 'page.login', function () {
//    return view('pages.login');
//}]);
//Route::get('give-me-token', ['as' => 'token', 'uses' => 'PageController@token']);
Route::group(['prefix' => 'api/v1'], function () {
    Route::resource('event', 'EventController');
    Route::get('list-event', ['as' => 'api.v1.list.event', 'uses' => 'EventController@listEvent']);
    Route::resource('users', 'UsersController');
    Route::get('list-users', ['as' => 'api.v1.list.users', 'uses' => 'UsersController@listusers']);
    Route::resource('klien', 'KlienController');
    Route::get('list-klien', ['as' => 'api.v1.list.klien', 'uses' => 'KlienController@listKlien']);
});

