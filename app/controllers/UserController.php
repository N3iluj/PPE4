<?php

class UserController extends \BaseController {

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
		return View::make('user/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		/*
		$mail = Input::get('mail');
		$regMail = '^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$';
		preg_match($regMail, $mail, $res);

		/*
		$rules = array('nom' => 'required|max:50|min:3','prenom' => 'required|max:50|min:3','adresse' => 'required|max:100|min:3','ville' => 'required|max:50|min:3', 'tel' => 'required|max:10|min:10','email' => 'required|max:50|min:3','pseudo' => 'required|max:50|min:3','password' => 'required|max:50|min:3','mdp2' => 'required|max:50|min:3');
		$validation=Validator::make(Input::all(),$rules);
  		if ($validation->fails())
  		{
  			Session::flash('fail', 'Certain(s) champs sont incorrect');
   			return Redirect::to('user/create')->withInput();
  		} 

  		else
  		{*//*
			$user = new User;

			if ((isset($mail)) && preg_match($regMail, $mail))
			{
				$user-> username=Input::get('mail');
				echo $user -> unsername;
			}

			else
			{
				Session::flash('fail', 'Adresse mail incorrecte');
   				return Redirect::to('user/create')->withInput();
			} 
			/*
				$user-> nom=Input::get('nom');
				$user-> prenom=Input::get('prenom');
				$user-> date_naissance=Input::get('dateNaissance');
				$user-> statut=Input::get('statut');
				$user-> adresse=Input::get('adresse');
				$user-> cp=Input::get('cp');
				$user-> ville=Input::get('ville');
				$user-> tel=Input::get('tel'); */ /*
			
			if(Input::get('password')==Input::get('mdp2')){
				$user-> password= Hash::make(Input::get('password'));
			}
			else {
				Session::flash('fail', 'Mots de passe différents');
				return Redirect::back()->withInput(); 
			}

			if($user->save()){
				return Redirect::to('projet/create');
			}
		
		}

		return Redirect::to('projet/create');*/
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

	public function mdpOublie()
	{
		echo 'lol';
	}
        public function getcg()
        {
            $lescgs=cg::all();
  return View::make('user/create')->with('lescgs',$lescgs);
        }


}
