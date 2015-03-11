<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


// ROUTES DE LOGIN ET DE CONNEXION UTILISATEUR

Route::controller('auth', 'AuthController');
Route::get('/', 'AuthController@getLogin');



//ROUTE REMINDER (OUBLI DE MOT DE PASSE)

Route::controller('password', 'RemindersController');



//ROUTES USERCONTROLLER + FONCTIONS FORGOT (MOT DE PASSE OUBLIE)

Route::resource('user', 'UserController');
Route::get('getForgot', 'UserController@getForgot');
Route::post('postForgot', 'UserController@postForgot');


Route::resource('exposition', 'ExpositionController');


Route::resource('repas', 'RepasController');



//NECESSITE D ETRE LOG POUR AVOIR ACCES A LA CREATION D'UN PROJET

Route::group(array('before'=>'auth'), function()
{
	Route::resource('projet', 'ProjetController');
});


Route::resource('hebergement', 'HebergementController');




//ROUTE RENVOYE PAR AUTH/LOGIN (FUTUR BACK OFFICE)

Route::get('hello', function()
{
	echo "lol";
}
);

//ROUTE RENVOYE LE CGU 


Route::get('cgu', function()
{
    return View::make('projet/cgu');
});



//ROUTE PAGE 404 SI INCONNUE

App::missing(function(){
	return View::make('404');
});


