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
    $courtList = \App\CourtList::get();
    return view('welcome',compact('courtList'));
});

Route::get('index','IndexController@index');
Route::post('index','IndexController@store')->name('court.store');

Route::get('center-delhi','IndexController@index');
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


Route::get('pdf-text-data','PdfController@index')->name('pdf-content');
Route::get('data/show/{id}','IndexController@listDataView')->name('show.data');
Route::get('list-data','IndexController@listData');
Route::get('dom-parser','IndexController@domParser');

Route::get('display-pdf','IndexController@displayPdf')->name('display');

Route::get('update-site-id','IndexController@updateSiteId');


Route::get('data/list/{id}','IndexController@getRecordById')->name('json.by-id');

Route::get('pdf-content', function () {
    return view('pdf-data');
})->name('pdf-view');


Route::get('date-search','IndexController@dateSearch');

Route::get('system-log','IndexController@systemLog')->name('system-log');


Route::get('search-data','IndexController@searchView')->name('search');

Route::get('data/list/','IndexController@getRecord')->name('json.data');

Route::prefix('case-type')->group(function(){
    Route::get('','CaseTypeController@index')->name('case-type');
    Route::get('request','CaseTypeController@serviceRequest')->name('case-type-request');
    Route::post('','CaseTypeController@store');
    // Route::get('parse-dom','CaseTypeController@parseDom')->name('parse-dom');
    Route::get('second-page/{id}','CaseTypeController@getSecondPage')->name('case-type.second-page');
    Route::get('third-page/{parent}/{row}','CaseTypeController@getThirdPage')->name('case-type.third-page');
});

