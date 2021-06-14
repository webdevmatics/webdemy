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
use Illuminate\Support\Facades\Storage;
use Vimeo\Laravel\VimeoManager;

Route::get('/', function (VimeoManager $vimeo) {

    $uri = '/videos/562872590';
    $result = $vimeo->request($uri . '?fields=transcode.status');

    dd($result);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/series', 'SeriesController');
Route::get('/series/{series}/episodes/{episodeNumber}', 'SeriesController@episode')->name('series.episode')->middleware(['auth','check-subscription']);


Route::group(['prefix' => 'admin'], function () {

    Route::get('/videos/upload', 'VideoUploadController@create');
    Route::post('/videos/upload', 'VideoUploadController@store')->name('video-upload.store');


    Voyager::routes();

});

Route::get('payment', 'PaymentController@payment');
Route::post('subscribe', 'PaymentController@subscribe');
