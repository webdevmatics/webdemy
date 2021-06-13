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

use App\Series;
use App\Services\VimeoAPI;

Route::get('/', function (VimeoAPI $api) {

    dd($api->uploadStatus("/videos/562423443"));
    dd($api->upload(public_path('obs-upload-test.mp4')));

    $featuredSeries = Series::take(3)->latest()->get();
    return view('front', compact('featuredSeries'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController');
Route::get('/series/{series}/episodes/{episodeNumber}', 'SeriesController@episode')->name('series.episode')->middleware(['auth','check-subscription']);


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('payment', 'PaymentController@payment');
Route::post('subscribe', 'PaymentController@subscribe');
