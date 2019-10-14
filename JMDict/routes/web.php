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
//deal with word resources.
Route::resource('word','WordController');
//Run once to load the words into the db.
Route::get('/wordimport', function (){ return view('wordimport');});

//Word search
Route::get('/wordSearch','WordSearchController@search');

//Route::get('/word','WordController@index');
//Route::get('/word/{word}','WordController@show');


