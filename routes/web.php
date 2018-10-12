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

Route::get('/songs/create', 'SongController@create');
Route::post('/songs/create', 'SongController@store');
Route::get('/songs/edit', 'SongController@edit');
Route::post('/songs/edit', 'SongController@store');
Route::get('/songs/list', 'SongController@listing');
Route::post('/songs/list', 'SongController@deleteItems');