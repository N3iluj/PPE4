@extends('template')
@section('navbar')

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <span class="navbar-brand">Brick A Dole</span>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">{{HTML::link('user/show', 'Mon profil')}}</li>
         @if (Auth::check())
            @if((Auth::user()->statut=="admin"))
                <li>{{HTML::link('user', 'Administration')}}</li>
            @endif
          @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>{{HTML::link('auth/logout', 'Deconnexion')}}</li>
      </ul>
    </div>
  </div>
</nav>



@section('contenu')
@parent


<h1> Profil de {{$unUser -> username}} </h1> <br \>


<ul class="nav nav-tabs">
  <li class="active"><a href="#info" data-toggle="tab">Vos informations</a></li>
  <li><a href="#projet" data-toggle="tab">Votre projet</a></li>
  <li><a href="#hebergement" data-toggle="tab">Votre hébergement</a></li>
</ul>


<!-- MODIFICATION INFORMATIONS UTILISATEUR -->


<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="info">
    <p>
    {{Form::open(array('url' => 'user/' . $unUser->id, 'method' => 'PUT','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
    {{ Form::hidden('user', Auth::user()->id) }}
      <fieldset>
        <legend>Modification de vos informations</legend><br \><br \><br \>


         <div id="formMail" class="form-group">
          <label id="labelMail" class="col-md-2 control-label" for="mail"> Adresse e-mail <span style="color: red;">*</span></label>
            <div class="col-md-5">
            {{ Form::email('mail', $unUser->email, array('id'=>'mail', 'class' => 'form-control', 'placeholder'=>'Adresse e-mail', 'onblur'=>'checkMail()', 'data-toggle'=>'mail', 'data-placement'=>'right', 'data-content'=>"L'adresse e-mail doit être valide" )) }}
            </div>
          </div>

          <div id="formPseudo" class="form-group">
            <label id="labelPseudo" class="col-md-2 control-label" for="pseudo">Pseudo </label>
              <div class="col-md-5">
              {{ Form::text('pseudo', $unUser->username, array('id'=>'pseudo', 'class' => 'form-control', 'data-content'=>'Le pseudo doit être inférieur à 20 caractères, contenir plus de 2 lettres et moins de 4 chiffres', 'data-placement'=>'right','placeholder'=>'Pseudo', 'onblur'=>'checkPseudo()', 'data-toggle'=>'pseudo')) }}
            </div>
          </div>


          <!-- INPUT NOM ET PRENOM -->


          <div id="formNom" class="form-group">
            <label id="labelNom" class="col-md-2 control-label" for="nom">Nom </label>
              <div class="col-md-5">
              {{ Form::text('nom', $unUser->nom, array('id'=>'nom', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Nom', 'data-toggle'=>'nom', 'onblur'=>'checkNom()')) }}
            </div>
          </div>

          <div id="formPrenom" class="form-group">
            <label id="labelPrenom" class="col-md-2 control-label" for="Prenom">Prénom </label>
              <div class="col-md-5">
              {{ Form::text('prenom', $unUser->prenom, array('id'=>'prenom', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Prénom', 'onblur'=>'checkPrenom()', 'data-toggle'=>'Prénom')) }}
            </div>
          </div>


          <!-- INPUT DATE DE NAISSANCE -->

          <?php



            //SEGMENTATION DE LA DATE DE NAISSANCE 

            $arrayDate = explode("-", $unUser->date_naissance);

            //DIVISION DATE DE NAISSANCE EN JOUR MOIS ANNEE

            $dateJ = $arrayDate[2];

            //FORMATAGE DU MOIS

            $dateM = substr($arrayDate[1], 1);

            $dateA = $arrayDate[0];




            //CREATION TABLEAU POUR INPUT SELECT

            $arrayM = array('1' => 'Janvier', '2' => 'Février', '3' => 'Mars', '4' => 'Avril', '5' => 'Mai', '6' => 'Juin', '7' => 'Juillet', '8' => 'Août', '9' => 'Septembre', '10' => 'Octobre', '11' => 'Novembre', '12' => 'Décembre');

          ?>


          <div class="form-group">

            {{ Form::label('dateNaissance','Date de naissance', array('class'=>'col-md-2 control-label')) }}
            <div class="col-md-1">
              {{ Form::number('dateJ', $dateJ, array('class'=>'form-control', 'onfocus'=>'this.select()')) }}
            </div>

            <div class="col-md-2">


              <!-- CREATION DU SELECT POUR LE MOIS DE NAISSANCE -->

              <select class="form-control">

                <?php

                  for ($i = 1; $i <= 12; $i++) 
                  {
                    if ($i == $dateM)
                    {
                      echo '<option value="' . $i . '" selected>' .  $arrayM[$i] . '</option>';
                    }
                    else
                    {
                      echo '<option value="' . $i . '">' .  $arrayM[$i] . '</option>';
                    }
                  }

                ?>

              </select>
            </div>

            <div class="col-md-2">
              {{ Form::number('dateA', $dateA, array('class'=>'form-control', 'onfocus'=>'this.select()')) }}
            </div>

        </div>


         <!-- INPUT BOUTON RADIO CHOIX STATUT EXPOSANT OU VENDEUR -->


          <?php

            if ($unUser->statut == 'exposant')
            {
              echo '<div id="formStatut" class="form-group">

                      <label class="col-md-2 control-label" for="statut">Vous êtes? </label>

                      <div class="col-md-10">

                        <div class="radio">
                          <label>
                            <input type="radio" name="statut" id="statut" value="exposant" checked="">
                            Exposant
                          </label>
                        </div>


                        <div class="radio">
                          <label>
                            <input type="radio" name="statut" id="statut" value="vendeur">
                            Vendeur
                          </label>
                        </div>

                      </div>

                    </div>';
            } 

            elseif ($unUser->statut == 'vendeur')
            {
             
              echo '<div id="formStatut" class="form-group">

                      <label class="col-md-2 control-label" for="statut">Vous êtes? </label>

                        <div class="col-md-10">

                          <div class="radio">
                            <label>
                              <input type="radio" name="statut" id="statut" value="exposant">
                              Exposant
                            </label>
                          </div>


                          <div class="radio">
                            <label>
                              <input type="radio" name="statut" id="statut" value="vendeur" checked="">
                             Vendeur
                            </label>
                          </div>

                        </div>

                    </div>';

            }

            else
            {

            }

          ?>


          <!-- INPUT ADRESSE POSTALE -->

          <div id="formAdresse" class="form-group">
            <label id="labelAdresse" class="col-md-2 control-label" for="adresse">Adresse </label>
              <div class="col-md-5">
              {{ Form::text('adresse', $unUser->adresse, array('id'=>'adresse', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Adresse', 'data-toggle'=>'adresse')) }}
            </div>
          </div>


          <div id="formCP" class="form-group">
            <label id="labelCP" class="col-md-2 control-label" for="cp">Code postal </label>
              <div class="col-md-5">
              {{ Form::text('cp', $unUser->cp, array('id'=>'cp', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Code postal', 'data-toggle'=>'Code postal')) }}
            </div>
          </div>


          <div id="formVille" class="form-group">
            <label id="labelVille" class="col-md-2 control-label" for="ville">Ville </label>
              <div class="col-md-5">
              {{ Form::text('ville', $unUser->ville, array('id'=>'ville', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Ville', 'data-toggle'=>'Ville')) }}
            </div>
          </div>


          <!-- INPUT NUMERO TELEPHONE -->


          <div id="formTel" class="form-group">
            <label id="labelTel" class="col-md-2 control-label" for="tel">Téléphone </label>
              <div class="col-md-5">
              {{ Form::text('tel', $unUser->tel, array('id'=>'tel', 'class' => 'form-control', 'data-placement'=>'right', 'placeholder'=>'Téléphone', 'data-toggle'=>'Téléphone')) }}
            </div>
          </div><br \><br \>



          <div class="form-group">
            <div class="col-md-5">
              <div style="text-align: right;">
                {{Form::submit('Mettre à jour', array('class'=>'btn btn-primary', 'id'=>'submit'))}}
                {{Form::close()}}
              </div>
            </div>
          </div> <br \><br \>



            
          </div>

        </div>
          </fieldset>
        </div>     
    </p>
  </div>




<!-- MODIFICATION INFORMATIONS PROJET -->

  <div class="tab-pane fade" id="projet">
    <p>
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Modification de votre projet</legend><br \><br \><br \>
      </fieldset>
    </p>
  </div>




<!-- MODIFICATION INFORMATIONS HEBERGEMENT -->

  <div class="tab-pane fade" id="hebergement">
    <p>
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Modification de vos informations d'hébergement</legend><br \><br \><br \>
      </fieldset>
    </p>
  </div>

</div>



<script>

//VERIFICATION ADRESSE EMAIL

  function checkMail() {
        
    var mail = document.getElementById('mail').value;

    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
            
    if(regEmail.test(mail)) {

      document.getElementById("labelMail").style.color = "black"

      $('[data-toggle="mail"]').popover('hide')
            
      return true;

    } else {

      document.getElementById("labelMail").style.color = "red"

      $('[data-toggle="mail"]').popover('show')
            
      return false;
    
    }

  }


    //VERIFICATION VALIDITE PSEUDO (2 CARACTERES MIN 3 CHIFFRES MAX LONGEUR TOTAL INF A 21)

    function checkPseudo() {
        
    var pseudo = document.getElementById('pseudo').value;

    var regPseudo = new RegExp('^[a-zA-Z]{2,17}[0-9]{0,3}$','i');
            
    if(regPseudo.test(pseudo)) {

      document.getElementById("labelPseudo").style.color = "black"

      $('[data-toggle="pseudo"]').popover('hide')
            
      return true;

    } else {

       document.getElementById("labelPseudo").style.color = "red"

      $('[data-toggle="pseudo"]').popover('show')
            
      return false;
    
    }

  }




  //VERIFICATION VALIDITE NOM

  function checkNom()
  {
    var nom = document.getElementById("nom").value;
    var regNom = new RegExp('[a-zA-Z]{1,20}$','i'); 

    if(regNom.test(nom))
    {

      document.getElementById("labelNom").style.color = "black"

      return true;
   
    }

    else
     {

      document.getElementById("labelNom").style.color = "red"

      return false;

    }
  }


  //VERIFICATION VALIDITE PRENOM

  function checkPrenom()
  {
    var prenom = document.getElementById("prenom").value;
    var regPrenom = new RegExp('[a-zA-Z]{1,20}$','i'); 

    if(regPrenom.test(prenom))
    {

      document.getElementById("labelPrenom").style.color = "black"

      return true;
   
    }

    else
     {

      document.getElementById("labelPrenom").style.color = "red"

      return false;

    }
  }



  //VERIFIE LA VALIDITE DES CHAMPS OBLIGATOIRE DU FORM


function checkForm() {

  if (checkMail() == true  && checkPseudo() && checkNom() == true && checkPrenom() == true)
  {
    return true;
  }
  else
  {
    return false;
  }

}


</script>



@stop
