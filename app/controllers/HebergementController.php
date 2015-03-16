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

			 $allergies = Allergie::all();
             foreach ($allergies as $uneAllergie)
             {
             	$inputAllergie = Input::get('cbx' . $uneAllergie -> id);

             	//SI L ALLERGIE EST COCHEE, ON L INSERT EN BASE AVEC L ID DE L UTILISATEUR CORRESPONDANT
             	
    			if (isset($inputAllergie))
    			{
    				DB::insert('insert into users_allergies (user_id, allergie_id) values (?, ?)', array($userid, $inputAllergie));
    			}

             }



			//ON TERMINE AVEC LA MISE A JOUR DES INFOS DE L UTILISATION EN BASE


			if($user->save())
			{

				if (Auth::check()) 
				{
    				return Redirect::to('projet/create');
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

			 $allergies = Allergie::all();
             foreach ($allergies as $uneAllergie)
             {
             	$inputAllergie = Input::get('cbx' . $uneAllergie -> id);

             	//SI L ALLERGIE EST COCHEE, ON L INSERT EN BASE AVEC L ID DE L UTILISATEUR CORRESPONDANT
             	
    			if (isset($inputAllergie))
    			{
    				DB::insert('insert into users_allergies (user_id, allergie_id) values (?, ?)', array($userid, $inputAllergie));
    			}

             }



			//ON TERMINE AVEC LA MISE A JOUR DES INFOS DE L UTILISATION EN BASE


			if($user->save())
			{
					Session::flash('success', 'Modifications enregistrées');
    				return Redirect::to('user/show');
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
		//
	}


}
