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



Route::controller('auth', 'AuthController');
Route::get('/', 'AuthController@getLogin');

Route::resource('user', 'UserController');
Route::get('mdpOublie', 'UserController@mdpOublie');


Route::resource('exposition', 'ExpositionController');


Route::resource('repas', 'RepasController');


Route::resource('projet', 'ProjetController');


Route::resource('hebergement', 'HebergementController');

Route::get('hello', function()
{
	echo "lol";
}
);


App::missing(function(){
	return View::make('404');
});


