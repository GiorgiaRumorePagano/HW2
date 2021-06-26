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

/*---------------------------------------------------------------------------------------------------------------------*/
Route::get('/', 'LogController@log');

/*PAGINA HOME----------------------------------------------------------------------------------------------------------*/
Route::get('home', 'HomeController@home');

/*PAGINA SEDI----------------------------------------------------------------------------------------------------------*/
Route::get('sedi', 'SediController@sedi');
Route::get('fetch_sedi', 'SediController@fetchSedi');

/*PAGINA CORSI----------------------------------------------------------------------------------------------------------*/
Route::get('corsi', 'CorsiController@corsi');
Route::get('fetch_corsi', 'CorsiController@fetchCorsi');
Route::get('api2', 'CorsiController@Api2');

/*PAGINA TRAINERS-------------------------------------------------------------------------------------------------------*/
Route::get('trainers', 'TrainersController@trainers');
Route::get('fetch_trainers', 'TrainersController@fetchTrainers');

/*PAGINA LOGIN----------------------------------------------------------------------------------------------------------*/
Route::get('login/{redirect?}', 'LoginController@login');
Route::post('login/{redirect?}', 'LoginController@checkLogin'); 

/*PAGINA LOGOUT----------------------------------------------------------------------------------------------------------*/
Route::get('logout', 'LoginController@logout');

/*PAGINA SIGNUP----------------------------------------------------------------------------------------------------------*/
Route::get('signup', 'SignUpController@signUp');
Route::post('signup', 'SignUpController@create');
Route::get('check_cf/{q}', 'SignUpController@checkCodiceFiscale');
Route::get('check_email/{q}', 'SignUpController@checkEmail');

/*PAGINA REGISTRAZIONE_OK----------------------------------------------------------------------------------------------------------*/
Route::get('registrazione_ok', 'RegOkController@ok');

    
/*PAGINA AREA RISERVATA-------------------------------------------------------------------------------------------------*/
Route::get('home_riservata', 'RiservataController@areaRiservata');
Route::get('cerca/{q}', 'RiservataController@RicercaIscritti');
Route::get('operazioni/1', 'RiservataController@operazione1');
Route::get('operazioni/2/{id_sede}', 'RiservataController@operazione2');
Route::get('operazioni/3/{id_corso}/{nome_corso}/{prezzo_corso}/{iscritti_corso}/{eta_corso}/{istruttore_corso}', 'RiservataController@operazione3');
Route::get('operazioni/4', 'RiservataController@operazione4');
Route::get('get_id_istruttore', 'RiservataController@getIdIstruttore');
Route::get('get_id_corso', 'RiservataController@getIdCorso');



