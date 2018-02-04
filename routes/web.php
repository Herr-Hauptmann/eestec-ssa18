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

###############################################################
########/////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\########
#######( Rute za novosti, nemaju veze sa admin panelom )#######
########\\\\\\\\\\\\\\\\\\\\\//////////////////////////########
###############################################################

Route::get('/novosti', 'HomeController@novosti')->name('novosti');
Route::get('/novost/{post}', 'HomeController@jednaNovost')->name('jednaNovost');

###############################################################
########/////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\#######
#######( Rute za partnere, nemaju veze sa admin panelom )######
########\\\\\\\\\\\\\\\\\\\\\///////////////////////////#######
###############################################################

Route::get('/partneri', 'HomeController@partneri')->name('partneri');

###############################################################
########/////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\#########
#######( Rute za medije, nemaju veze sa admin panelom )########
########\\\\\\\\\\\\\\\\\\\\\/////////////////////////#########
###############################################################

Route::get('/mediji', 'HomeController@mediji')->name('mediji');

###############################################################
###//////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\##
##( Rute za treninge i trenere, nemaju veze sa admin panelom )#
###\\\\\\\\\\\\\\\\\\\\\\\\\\////////////////////////////////##
###############################################################

Route::get('treninzi-i-treneri', 'HomeController@treninziITreneri')->name('treninzi-i-treneri');

###############################################################
#######//////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\########
######( Rute za galeriju, nemaju veze sa admin panelom )#######
#######\\\\\\\\\\\\\\\\\\\\\\//////////////////////////########
###############################################################

Route::get('galerija', 'HomeController@galerija')->name('galerija');
Route::get('album/{godina}', 'HomeController@album')->name('album');
Route::get('album/{godina}/{dan}', 'HomeController@dan')->name('dan');

###############################################################
#######//////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\#########
######( Rute za kontakt, nemaju veze sa admin panelom )########
#######\\\\\\\\\\\\\\\\\\\\\\/////////////////////////#########
###############################################################

Route::get('kontakt', 'HomeController@kontakt')->name('kontakt');
Route::post('posalji-mail', 'KontaktController@sendMail')->name('posalji-mail');


###############################################################
######################///////\\\\\\\\\\########################
#####################( Rute za prijave )#######################
######################\\\\\\\//////////########################
###############################################################

Route::get('prijava', 'PrijavaController@create')->name('prijava.create');
Route::post('prijava', 'PrijavaController@store')->name('prijava.store');
Route::patch('admin/otvori-prijave', 'PrijavaController@otvoriPrijave')->name('otvori.prijave');
Route::patch('admin/zatvori-prijave', 'PrijavaController@zatvoriPrijave')->name('zatvori.prijave');

############# ADMIN PANEL PRIJAVE ##############
Route::get('admin/prijave', 'PrijavaController@index')->name('prijava.index')->middleware('can:pregledaj prijave');

Route::get('admin/prijave/bodovi', 'PrijavaController@bodovi')->name('prijava.bodovi')->middleware('can:pregledaj prijave');

Route::get('admin/prijave/{participant}', 'PrijavaController@show')->name('prijava.show')->middleware('can:pregledaj prijave');
Route::post('admin/prijave/{participant}', 'PrijavaController@boduj')->name('prijava.boduj')->middleware('can:pregledaj prijave');


###############################################################
#######//////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\#########
######(                ADMIN PANEL                    )########
#######\\\\\\\\\\\\\\\\\\\\\\/////////////////////////#########
###############################################################

Route::get('admin', function() {
	return redirect()->route('posts.index');
})->name('admin.dashboard');

Route::resource('admin/posts', 'PostsController');
Route::resource('admin/media', 'MediaController');
Route::resource('admin/partners', 'PartnersController');
Route::resource('admin/kontakt', 'KontaktController');
Route::resource('admin/participants', 'ParticipantsController');
Route::resource('admin/trainers', 'TrainersController');
Route::resource('admin/trainings', 'TrainingsController');
Route::resource('admin/users', 'UsersController');

Route::patch('admin/change-permissions/{user}', 'UsersController@changePermissions')->middleware(['auth', 'role:root'])->name('permissions.indirect.change');
Route::patch('admin/change-direct-permissions/{user}', 'UsersController@changeDirectPermissions')->middleware(['auth', 'role:root'])->name('permissions.direct.change');

Route::get('admin/permissions/{user}', 'UsersController@getMissingPermissions')->middleware(['auth', 'role:root'])->name('permissions.getMissingJson');
