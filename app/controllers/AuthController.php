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

		//VERIFICATION SI ADRESSE EMAIL CONNUE

		$username=Input::get('user');

		//RECHERCHE DES USERS AVEC CETTE ADRESSE EMAIL

		$unUser = DB::table('users')->where('email', $username)->first();

		
		if (empty($unUser)) 
		{

			//SI PAS D'USER AVEC CETTE ADRESSE EMAIL, ON TENTE UNE CONNEXION AVEC LE USERNAME

			$user = array('username' => $username, 'password' => Input::get('password'));

			if (Auth::attempt($user)) 
			{
		  		return Redirect::intended('hello')
				->with(Session::flash('success', 'Vous êtes connecté') . Auth::user()->username);
			}
		
			return Redirect::to('auth/login')->with(Session::flash('fail', 'Login ou mot de passe incorrect'))->withInput();
		}

		else
		{

			//SI IL Y A UN USER AVEC CETTE ADRESSE EMAIL, ON RECUPERER SON PSEUDO POUR LE CONNECTER

   			$user = array('username' => $unUser -> username, 'password' => Input::get('password'));
   			if (Auth::attempt($user)) 
			{
		  		return Redirect::intended('hello')
				->with(Session::flash('success', 'Vous êtes connecté') . Auth::user()->username);
			}
		
			return Redirect::to('auth/login')->with(Session::flash('fail', 'Login ou mot de passe incorrect'))->withInput(); 				
		}

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
