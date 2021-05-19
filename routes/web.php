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

Route::get('/', 'UsersController@index');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::resource('users', 'UsersController', ['only' => ['show']]);

Route::group(['prefix' => 'users/{id}'], function () {
    Route::get('followings', 'UsersController@followings')->name('followings');
    Route::get('followers', 'UsersController@followers')->name('followers');
});

Route::group(['middleware' => 'auth'], function () {

    Route::post('/','SongsController@redirectPage')->name('top.page');

    Route::group(['prefix'=>'songs/{id}'],function(){
        Route::post('favorite','FavoriteController@store')->name('favorites.favorite');
        Route::delete('unfavorite','FavoriteController@destroy')->name('favorites.unfavorite');
    });
    
    Route::group(['prefix' => 'users/{id}'], function () {
        Route::post('follow', 'UserFollowController@store')->name('follow');
        Route::delete('unfollow', 'UserFollowController@destroy')->name('unfollow');
    });

    Route::get('user/detail/{id}', 'UsersController@showDetail')->name('detail.user');
    Route::get('search', 'UsersController@search')->name('users.search');
    Route::resource('songs', 'SongsController', ['only' => ['create', 'store', 'destroy']]);
});

Route::get('/chat', 'ReviewController@index')->name('home');
Route::post('/add', 'ReviewController@add')->name('chat.add');
Route::get('/result/ajax', 'ReviewController@getData');
