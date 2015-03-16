<?php

class ProjetController extends \BaseController {


	public function __construct()
  {
  		$this->beforeFilter('auth', array('only' => 'getLogout'));
	//	$this->beforeFilter('guest', array('except' => 'getLogout'));
		$this->beforeFilter('csrf', array('on' => 'post'));
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('projet/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array('theme' => 'required', 'piece' => 'required', 'longueur' => 'required', 'largeur' => 'required', 'estimation' => 'required');
		$validation=Validator::make(Input::all(),$rules);
  		if ($validation->fails())
  		{
  			Session::flash('fail', 'Certain(s) champs sont incorrect');
   			return Redirect::to('projet/create')->withInput();
  		}
  		else
  		{
			//INSTANCIATION DU PROJET

			$projet = new Projet;

			$projet-> theme=Input::get('theme');
			$projet-> longueur=Input::get('longueur');
			$projet-> largeur=Input::get('largeur');
			$projet-> nb_piece=Input::get('piece');
			$projet-> valeur=Input::get('estimation');
			$projet-> courant=Input::get('elec');
			$projet-> user_id=Input::get('user'); 


			//INSERTION EN BASE

			if($projet->save())
			{

				$user = User::find($projet -> user_id);

				// TRANSFORMATION OBJET USER TO ARRAY

				DB::setFetchMode(PDO::FETCH_ASSOC);

				$unUser = DB::table('users')->where('id', $user -> id)->first();

				DB::setFetchMode(PDO::FETCH_CLASS);



				// ENVOI DU MAIL

				Mail::send('emails/inscription', $unUser, function($m) use ($user)
				{
    				$m->to($user -> email, 'Lego')->subject('Inscription terminée !');
				});


				return Redirect::to('auth/login')->with(Session::flash('success', "Inscription terminée. Un email contenant les informations sur l'exposition vous a été envoyé."));
				
			}
		
		} 
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array('theme' => 'required', 'piece' => 'required', 'longueur' => 'required', 'largeur' => 'required', 'estimation' => 'required');
		$validation=Validator::make(Input::all(),$rules);
  		if ($validation->fails())
  		{
  			Session::flash('fail', 'Certain(s) champs sont incorrect');
   			return Redirect::to('user/show')->withInput();
  		}
  		else
  		{
			//INSTANCIATION DU PROJET

			$projet = new Projet;

			$projet-> theme=Input::get('theme');
			$projet-> longueur=Input::get('longueur');
			$projet-> largeur=Input::get('largeur');
			$projet-> nb_piece=Input::get('piece');
			$projet-> valeur=Input::get('estimation');
			$projet-> courant=Input::get('elec');
			$projet-> user_id=Input::get('user'); 


			//INSERTION EN BASE

			if($projet->save())
			{
				Session::flash('success', 'Modifications enregistrées');
    			return Redirect::back();
			}

		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$unProjet=Projet::find($id);

		if ($unProjet -> delete())
		{
			Session::flash('danger', 'Projet supprimé');
			return Redirect::to('/user/show');
		}
	}


}
