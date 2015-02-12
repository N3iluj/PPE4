<?php

class AuthController extends BaseController {

	public function __construct()
  {
  		$this->beforeFilter('auth', array('only' => 'getLogout'));
	//	$this->beforeFilter('guest', array('except' => 'getLogout'));
		$this->beforeFilter('csrf', array('on' => 'post'));
  }


  /**
	* Affiche le formulaire de login
	*
	* @return View
	*/
	public function getLogin()
	{
		return View::make('auth/login');
	}


  /**
	* Traitement du formulaire de login
	*
	* @return Redirect
	*/
	public function postLogin()
	{
		$user = array('username' => Input::get('user'), 'password' => Input::get('password'));
		if (Auth::attempt($user)) {
		  return Redirect::intended('hello')
			->with(Session::flash('success', 'Vous êtes connecté') . Auth::user()->username);
		}
		return Redirect::to('auth/login')->with(Session::flash('fail', 'Login ou mot de passe incorrect'))->withInput();  
	}

   
  /**
	* Effectue le logout
	*
	* @return Redirect
	*/
	public function getLogout()
	{
		Auth::logout(); 
		return Redirect::to('auth/login')->with(Session::flash('info', 'Vous êtes déconnecté'));
	}

}
