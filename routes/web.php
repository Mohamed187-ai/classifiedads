<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\helper;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('ad', 'AdsController@create')->name('ads.create');

Route::post('ad', 'AdsController@store')->name('ads.store');

Route::get('test', function () {
    return helper::slug('موقع اعلانات مبوبة');
});

Route::get('myAds', 'AdsController@getUserAds');

Route::resource('ads', 'AdsController');

Route::get('{id}/{slug}', 'AdsController@getByCategory');

Route::get('ad/{id}/{slug}','AdsController@show');

Route::post('search', 'AdsController@search');

Route::resource('comments', 'CommentController')->only([
    'show','store', 'destroy'
]);

Route::post('comment/reply', 'CommentController@reply');

Route::get('myFav', 'AdsController@getUserFavorites')->middleware('auth');

Route::get('category/{id}/{slug}', 'AdsController@getAdsByCategory');

Route::post('ads/{id}/favorite','FavoriteController@store');

Route::post('ads/{id}/unfavorite','FavoriteController@destroy');

Route::get('/', 'AdsController@getCommonAds');

Route::get('userFav', 'FavoriteController@index');

Route::post('send', 'SendMailController@sendMail');