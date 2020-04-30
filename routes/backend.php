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
Route::get('/', 'Backend\HomeController@welcome')->name('backend.welcome');

// Authentication Routes...
Route::get('login', 'Backend\Auth\LoginController@showLoginForm')->name('backend.login');
Route::post('login', 'Backend\Auth\LoginController@login')->name('backend.login.submit');
Route::post('logout', 'Backend\Auth\LoginController@logout')->name('backend.logout');

// Password Reset Routes...
//Route::get('password/reset', 'Backend\Auth\ForgotPasswordController@showLinkRequestForm')->name('backend.password.request');
//Route::post('password/email', 'Backend\Auth\ForgotPasswordController@sendResetLinkEmail')->name('backend.password.email');
//Route::get('password/reset/{token}', 'Backend\Auth\ResetPasswordController@showResetForm')->name('backend.password.reset');
//Route::post('password/reset', 'Backend\Auth\ResetPasswordController@reset')->name('backend.password.update');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'Backend\HomeController@home')->name('backend.home');

    //traditional songs
    Route::resource('traditional_songs', 'Backend\TraditionalSongController', ['as' => 'backend']);
    //Knowledge Hub Videos
    Route::resource('knowledge_hub_videos', 'Backend\KnowledgeHubVideosController', ['as' => 'backend']);
    //Knowledge Hub Images
    Route::resource('knowledge_hub_images', 'Backend\KnowledgeHubImagesController', ['as' => 'backend']);
    //Knowledge Hub Audios
    Route::resource('knowledge_hub_audios', 'Backend\KnowledgeHubAudiosController', ['as' => 'backend']);
    //FAQ
    Route::resource('faq', 'Backend\FrequentlyAskedQuestionsController', ['as' => 'backend']);
    //song categories
    Route::resource('song_categories', 'Backend\SongCategoryController', ['as' => 'backend']);
    //hand work categories
    Route::resource('hand_work_categories', 'Backend\HandWorkCategoryController', ['as' => 'backend']);
    //hand work
    Route::resource('hand_works', 'Backend\HandWorkController', ['as' => 'backend']);
    //hand work images
    Route::resource('hand_work_images', 'Backend\HandWorkImageController', ['as' => 'backend']);
    //proverbs
    Route::resource('proverbs', 'Backend\ProverbController', ['as' => 'backend']);
    //traditional games
    Route::resource('traditional_games', 'Backend\TraditionalGameController', ['as' => 'backend']);
    //riddles
    Route::resource('riddles', 'Backend\RiddleController', ['as' => 'backend']);
    Route::resource('push_notifications', 'Backend\PushNotificationController', ['as' => 'backend']);

    //new creations
    Route::resource('new_creations', 'Backend\NewCreationController', ['as' => 'backend']);

	Route::resource('user', 'Backend\UserController', ['except' => ['show'], 'as' => 'backend']);
	Route::get('profile', ['as' => 'backend.profile.edit', 'uses' => 'Backend\ProfileController@edit']);
	Route::put('profile', ['as' => 'backend.profile.update', 'uses' => 'Backend\ProfileController@update']);
	Route::put('profile/password', ['as' => 'backend.profile.password', 'uses' => 'Backend\ProfileController@password']);

    // Settings Routes
    Route::get('settings/index',  ['as' => 'backend.settings.index', 'uses' => 'Backend\SettingController@index']);
    Route::post('settings/update', ['as' => 'backend.settings.update', 'uses' => 'Backend\SettingController@update']);

	Route::get('{page}', ['as' => 'backend.page.index', 'uses' => 'Backend\PageController@index']);


});

