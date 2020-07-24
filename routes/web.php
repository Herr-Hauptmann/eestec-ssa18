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

// Authentication Routes...
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->middleware(['guest'])->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->middleware(['guest'])->name('register');
Route::post('admin/register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/', 'HomeController@index')->name('home');

###############################################################
########/////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\########
########\\\\\\( SSA LITE RUTE I OSTALE BUDALASTINE )////#######
########\\\\\\\\\\\\\\\\\\\\\//////////////////////////########
###############################################################

Route::get('/lite', function()
{
	return view('lite/lite-home');
})->name('lite-stranica');

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
	return redirect()->route('prijava.index');
})->name('admin.dashboard');

Route::prefix('admin')->middleware(['auth', 'role:organizer'])->group(function() {
	Route::resource('posts', 'PostsController');
	Route::resource('media', 'MediaController');
	Route::resource('partners', 'PartnersController');
	Route::resource('kontakt', 'KontaktController');
	Route::resource('participants', 'ParticipantsController');
	Route::resource('trainers', 'TrainersController');
	Route::resource('trainings', 'TrainingsController');
	Route::resource('users', 'UsersController')->middleware(['role:root']);
});

Route::patch('admin/change-permissions/{user}', 'UsersController@changePermissions')->middleware(['auth', 'role:root'])->name('permissions.indirect.change');
Route::patch('admin/change-direct-permissions/{user}', 'UsersController@changeDirectPermissions')->middleware(['auth', 'role:root'])->name('permissions.direct.change');

Route::get('admin/permissions/{user}', 'UsersController@getMissingPermissions')->middleware(['auth', 'role:root'])->name('permissions.getMissingJson');


###############################################################
#######//////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\#########
######(          PARTICIPANTI PLATFORMA               )########
#######\\\\\\\\\\\\\\\\\\\\\\/////////////////////////#########
###############################################################


Route::prefix('participant')->group(function() {
	Route::get('login', 'ParticipantsController@showLoginFormParticipant')->middleware(['guest'])->name('participant.login.show');
	Route::post('login', 'ParticipantsController@loginParticipant')->name('participant.login');
	Route::get('register', 'ParticipantsController@showRegistrationFormParticipant')->middleware(['guest'])->name('participant.register.show');
	Route::post('register', 'ParticipantsController@registerParticipant')->name('participant.register');
	Route::post('logout', 'ParticipantsController@logoutParticipant')->name('participant.logout');
	
	Route::prefix('profil')->middleware(['auth'])->group(function() {
		Route::get('/', 'ParticipantsController@profile')->name('participant.profile');
		Route::get('uredi', 'ParticipantsController@edit')->name('participant.edit');
		Route::put('edit', 'ParticipantsController@update')->name('participant.update');
	});
	
	Route::post('emailCheck', 'ParticipantsController@emailCheck')->name('emailCheck');


});


Route::prefix('kompanija')->group(function() {
	//TODO: login, registracija
	Route::get('pretraga', 'CompaniesController@index')->name('company.index');
	Route::get('profil', 'CompaniesController@profile')->name('company.profile');
});







Route::get('/admin/temp', function(\Illuminate\Http\Request $request) {

	// funkcija migrira podatke iz dvije stare baze o prijavama kako bi mogli znati ko se nekad prijavio
	// i ko je mozda prisustvovao SSA

	if ($request->get('keyword') !== 'mehkevjestine') {
		return response('Ne mere', 403);
	}

	$data = \DB::connection('mysql2')->table('applications_application')
		->leftJoin('applications_acceptedapplication', 'applications_application.id', '=', 'applications_acceptedapplication.application_id')
		->select(\DB::raw('CONCAT(applications_application.ime, \' \', applications_application.prezime) AS name'), 'applications_application.email', 'applications_application.vrijeme_prijave AS created_at', 'applications_acceptedapplication.accepted')
		->get()->toArray();

	$data2 = \DB::connection('mysql3')->table('participant')
		->select(\DB::raw('CONCAT(ime, \' \', prezime) AS name'), 'email')
		->get()->toArray();

	$blee = "Emina Đapo
Alma Mujanović
Emin Šehić
Anja Bećirspahić
Rijad Pedljak
Selma Imamović
Nermina Žigić
Lejla Fatušić
Ena Žunić
Fatima Kovačević
Amina Mehanović
Mak Fišić
Sulejman Ćerimović
Nejra Šteta
Dino Hašimbegović
Benjamin Hadžić
Amina Bralić
Durmo Mršo
Irhad Halilović
Tarik Bučan
Nedret Bećirović
Ana-Marija Milisav
Damir Medunjanin
Aida Masleša
Fatima Pobrklić
Adina Šahinović
Adisa Čopra
Alma Karačić
Elma Kupusović
Lejla Džanko
Dina Sarajlić
Jasmin Pašić
Rasim Šabanović
Dino Šporer
Haris Arslanagić
Amila Bjelopoljak 
Fikreta Duranović
Amar Burić
Darko Vrbičić";

	$ssa17_participanti = preg_split("/\\r\\n|\\r|\\n/", $blee);

	foreach($data2 as &$item) {
		$item->created_at = '2017-02-05';
		if (\in_array($item->name, $ssa17_participanti)) {
			$item->accepted = 1;
		}
		else {
			$item->accepted = null;
		}
	}

	unset($item);

	// $data3 = App\Participant::select(\DB::raw('CONCAT(ime, \' \', prezime) AS name'), 'email', 'created_at')
	// 	->get()->toArray();

	// foreach ($data3 as &$item) {
	// 	$item = (object) $item;
	// }

	// unset($item);

	$full = array_merge($data, $data2);

	foreach ($full as &$item) {
		$item = (array) $item;
	}
	unset($item);

	// dd($full);

	\DB::table('old_applications')->insert($full);
	
	return response('SUCCESS');

});