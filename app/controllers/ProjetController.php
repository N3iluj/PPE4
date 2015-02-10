<?php

class ProjetController extends \BaseController {

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
		$rules = array('theme' => 'required|max:50|min:3');
		$validation=Validator::make(Input::all(),$rules);
  		if ($validation->fails())
  		{
  			Session::flash('fail', 'Certain(s) champs sont incorrect');
   			return Redirect::to('projet/create')->withInput();
  		}
  		else
  		{
			$projet = new User;
			$projet-> nom=Input::get('nom');
			$projet-> prenom=Input::get('prenom');
			$projet-> date_naissance=Input::get('dateNaissance');
			$projet-> statut=Input::get('statut');
			$projet-> adresse=Input::get('adresse');
			$projet-> cp=Input::get('cp');
			$projet-> ville=Input::get('ville');
			$projet-> tel=Input::get('tel');
			$projet-> email=Input::get('email');
			$projet-> username=Input::get('pseudo');
			
			if(Input::get('password')==Input::get('mdp2')){
				$projet-> password= Hash::make(Input::get('password'));
			}
			else {
				Session::flash('fail', 'Mots de passe différents');
				return Redirect::back()->withInput(); 
			}

			if($projet->save()){
				return Redirect::to('projet/create');
			}
		
		}

		return Redirect::to('projet/create');
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
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
