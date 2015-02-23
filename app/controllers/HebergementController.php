<?php

class HebergementController extends \BaseController {

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
		return View::make('hebergement/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

  			//INSTANCIATION DE L'HEBERGEMENT


			$hebergement = new Hebergement;

			$hebergement-> nom=Input::get('nom');
			$hebergement-> prenom=Input::get('prenom');
			$hebergement-> statut=Input::get('statut');
			$hebergement-> adresse=Input::get('adresse');
			$hebergement-> cp=Input::get('cp');
			$hebergement-> ville=Input::get('ville');
			$hebergement-> cgu=Input::get('cgu'); 


			//INSERTION EN BASE

			if($user->save())
			{
				if (Auth::attempt(array('email' => $mail, 'password' => $pass))) 
				{
    				return Redirect::to('projet/create');
				}
				
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
