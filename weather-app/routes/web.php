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

Route::get('/',[
    'uses'=>'WeatherController@getPopularCities',
    'as'=>'home'
]);

Route::post('/checkweather',[
    'uses'=>'WeatherController@postCheckWeather',
    'as'=>'checkweather'
]);
Route::get('/popularcities',[
    'uses'=>'WeatherController@getAllPopularCities',
    'as'=>'popularcities'
]);