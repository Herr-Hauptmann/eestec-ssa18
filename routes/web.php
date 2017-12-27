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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/novosti', 'HomeController@novosti')->name('novosti');
Route::get('/novost/{post}', 'HomeController@jednaNovost')->name('jednaNovost');

Route::resource('posts', 'PostsController');
Route::resource('media', 'MediaController');