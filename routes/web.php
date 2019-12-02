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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/','PostController@index');
Route::get('/post','PostController@index');
Route::get('/home','PostController@index');
Route::resource('post','PostController');
Route::resource('video','VideoController');
Route::resource('region','RegionController');
Route::post('store/{id}','PostController@storeComment');
Route::post('vstore/{id}','VideoController@vstoreComment');
Route::get('qrcode','VideoController@qrshow');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
