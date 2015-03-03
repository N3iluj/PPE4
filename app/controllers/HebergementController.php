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

  			//INSTANCIATION DE L'UTILISATEUR

			$user = User::find(Input::get('user')); 

			//MISE A JOUR DES INFORMATIONS HEBERGEMENT DE L'UTILSATEUR

			$user-> repas1mid=Input::get('repas1mid');
			$user-> repas1soir=Input::get('repas1soir');
			$user-> repas2mid=Input::get('repas2mid');
			$user-> repas2soir=Input::get('repas2soir');
			$user-> internat=Input::get('internat');
			$user-> salle=Input::get('salle'); 


			//ON RECUPERER L ID DE L UTILISATEUR

			$userid = $user-> id;


			//ON RECUPERE TOUS LES INPUTS D ALLERGIES

			for ($i = 0; $i < 13; $i++)
			{
				$inputAllergie = Input::get('allergie' . $i);

				//SI L ALLERGIE EST COCHEE, ON L INSERT EN BASE AVEC L ID DE L UTILISATEUR CORRESPONDANT

    			if (isset($inputAllergie))
    			{
    				DB::insert('insert into allergies (nom, user_id) values (?, ?)', array($inputAllergie, $userid));
    			}
			}


			//ON TERMINE AVEC LA MISE A JOUR DES INFOS DE L UTILISATION EN BASE


			if($user->save())
			{
    				return Redirect::to('auth/login')->with(Session::flash('success', "Inscription validée. Les informations concernant l'exposition vous ont été envoyées par email")); 
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
