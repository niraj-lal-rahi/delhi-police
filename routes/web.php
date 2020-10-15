<?php

use Illuminate\Support\Facades\Route;

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

Route::get('index','IndexController@index');
Route::post('index','IndexController@store')->name('court.store');

Route::get('east-delhi','IndexController@eastDelhi');
Route::get('new-delhi','IndexController@newDelhi');
Route::get('north-delhi','IndexController@northDelhi');
Route::get('south-delhi','IndexController@southDelhi');
Route::get('west-delhi','IndexController@westDelhi');
Route::get('south-west-delhi','IndexController@southWestDelhi');
Route::get('south-east-delhi','IndexController@southEastDelhi');
Route::get('shahdra','IndexController@shahdra');
Route::get('north-west-delhi','IndexController@northWestDelhi');
Route::get('north-east-delhi','IndexController@northEastDelhi');


Route::get('pdf-generator','PdfController@index');

Route::get('data/{id}','IndexController@show');
