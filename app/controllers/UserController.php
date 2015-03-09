<?php

class UserController extends \BaseController {

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
		return View::make('user/create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
		$rules = array('pseudo' => 'max:50|min:1', 'nom' => 'required|max:50|min:1','prenom' => 'required|max:50|min:1', 'dateJ'=>'alpha_num', 'dateA'=>'alpha_num', 'adresse' => 'max:100|min:3','ville' => 'max:50|min:3', 'tel' => 'max:30|min:10','mail' => 'required|email', 'pass1' => 'required|max:50|min:8','pass2' => 'required|max:50|min:8', 'cgu' => 'required');	
		$validation=Validator::make(Input::all(),$rules);
		

  		if ($validation->fails())
  		{
  			Session::flash('fail', $validation);
   			return Redirect::to('user/create')->withInput();
  		} 

  		else
  		{

  			//INSTANCIATION DE L'UTILISATEUR


			$user = new User;


			//GENERATION PSEUDO ALEATOIRE POUR PERMETTRE L AUTHENTIFICATION 
			//AVEC ADRESSE EMAIL OU PSEUDO (CF AUTHCONTROLLER FONCTION POSTLOGIN)

			$pseudo = Input::get('pseudo');
			if (empty($pseudo)) 
			{
				$chaine = "abcdefghijklmnpqrstuvwxy";
				$car = 10;
				srand((double)microtime()*1000000);
				for($i=0; $i<$car; $i++) 
				{
					$pseudo .= $chaine[rand()%strlen($chaine)];
				}
			}


		

			//VERIFIE SI ADRESSE EMAIL DEJA UTILISE

			$mail = Input::get('mail');
			$res = DB::table('users')->where('email', $mail)->first();
			if (empty($res)) 
			{
				$user -> email = $mail;
			}
			else
			{
				Session::flash('fail', 'Adresse e-mail déjà utilisée');
   				return Redirect::to('user/create')->withInput(Input::except('mail'));					
			}



			//VERIFIE SI PSEUDO DEJA UTILISE

			$res = DB::table('users')->where('username', $pseudo)->first();
			if (empty($res)) 
			{
				$user -> username = $pseudo;
			}
			else
			{
				Session::flash('fail', 'Pseudo déjà utilisé');
   				return Redirect::to('user/create')->withInput(Input::except('pseudo'));					
			}



			//VERIFICATION CORRESPONDANCE DES PASS
			
			if(Input::get('pass1')==Input::get('pass2'))
			{
				$pass = Input::get('pass1');
				$user-> password = Hash::make($pass);
			}
			else 
			{
				Session::flash('fail', 'Les mots de passe ne correspondent pas');
				return Redirect::to('user/create')->withInput(Input::except('cgu'));
			}



			//VERIFIE SI CGU ACCEPTE

			$cgu = Input::get('cgu');
			if ($cgu == 1) 
			{
				$user -> cgu = $cgu;
			}
			else
			{
				Session::flash('fail', "Veuillez accepeter les Conditions Générales d'Utilisation");
   				return Redirect::to('user/create')->withInput(Input::except('cgu'));					
			}



			//VERIFIE SI TEL DEJA UTILISE

			$tel = Input::get('tel');
			$res = DB::table('users')->where('tel', $tel)->first();
			if (empty($res)) 
			{
				$user -> tel = $tel;
			}
			else
			{
				Session::flash('fail', 'Numéro de téléphone déjà utilisé');
   				return Redirect::to('user/create')->withInput(Input::except('tel'));					
			}



			//FORMATAGE DE LA DATE DE NAISSANCE

			$date = Input::get('dateA') .'-'. Input::get('dateM') . '-' . Input::get('dateJ');
			$user -> date_naissance = $date;



			$user-> nom=Input::get('nom');
			$user-> prenom=Input::get('prenom');
			$user-> statut=Input::get('statut');
			$user-> adresse=Input::get('adresse');
			$user-> cp=Input::get('cp');
			$user-> ville=Input::get('ville');
			$user-> cgu=Input::get('cgu'); 


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
	public function show()
	{
		$id = Auth::user()->id;
		$unUser=User::find($id);
		return View::make('user/update')->with('unUser', $unUser);
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