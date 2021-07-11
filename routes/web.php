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

Auth::routes();
// ゲストのトップページ
Route::get('/', 'UsersController@index')->name('user.index');

// 新規登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// ログイン・ログアウト
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

//パスワードリセット
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// 認証後
Route::group(['middleware' => 'auth'], function () {
    Route::prefix('users/{id}')->name('users.')->group(function () {
        // マイページの表示
        Route::get('/mypage', 'UsersController@myPage')->name('mypage');

        // 個別ユーザ詳細ページ
        Route::get('/detail', 'UsersController@showDetail')->name('detail');

        // インスタID更新
        Route::put('/insta', 'UsersController@updateInstaId')->name('insta');

        // ユーザ編集ページ・処理
        Route::get('/edit', 'UsersController@editUser')->name('edit');
        Route::put('/update', 'UsersController@updateUser')->name('update');

        // ユーザ削除ページ・処理
        Route::get('/delete/confirm', 'UsersController@deletePage')->name('deletePage');
        Route::put('/delete', 'UsersController@deleteUser')->name('delete');

        // タブUIのフォロー・フォロワー表示
        Route::get('/followings', 'UsersController@followings')->name('followings');
        Route::get('/followers', 'UsersController@followers')->name('followers');

        // フォロー・アンフォロー処理
        Route::put('/follow', 'UsersController@follow')->name('follow');
        Route::delete('/follow', 'UsersController@unfollow')->name('unfollow');
    });

    // ユーザ検索
    Route::get('search', 'UsersController@search')->name('users.search');

    // プロフィール画像の設定
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::post('/store', 'UsersController@profileStore')->name('store');
        Route::delete('/{id}/delete', 'UsersController@deleteImage')->name('delete');
    });

    Route::resource('songs', 'SongsController', ['only' => ['create', 'store', 'destroy']]);

    // いいね処理
    Route::prefix('songs/{song}')->name('songs.')->group(function () {
        Route::put('/favorite', 'SongsController@favorite')->name('favorite');
        Route::delete('/favorite', 'SongsController@unfavorite')->name('unfavorite');
    });

    // Chat機能
    Route::get('/chat', 'ReviewController@index')->name('home.chat');
    Route::post('/add', 'ReviewController@add')->name('chat.add');
    Route::get('/result/ajax', 'ReviewController@getData');
});
