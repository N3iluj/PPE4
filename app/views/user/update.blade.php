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
  <li><a href="#projet" data-toggle="tab">Vos projets</a></li>
  <li><a href="#hebergement" data-toggle="tab">Votre hébergement</a></li>
</ul>


<!-- MODIFICATION INFORMATIONS UTILISATEUR -->


<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="info">
    <p>
    {{Form::open(array('url' => '/user/' . $unUser->id, 'method' => 'PUT','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
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

              <select name="dateM" class="form-control">

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
              echo '<div id="formStatut" class="form-group">
                      <label class="col-md-2 control-label" for="statut">Vous êtes? </label>
                      <div class="col-md-10">
                      <div class="radio">
                            <label>
                              <input type="radio" name="statut" id="statut" value="admin" checked=""  >
                              Administrateur
                            </label>
                          </div>
                      </div>
                      </div>';
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


          </fieldset>
            </p>
          </div>






<!-- MODIFICATION INFORMATIONS PROJET -->

  <div class="tab-pane fade" id="projet">
    <p>
      <fieldset>
        <legend>Modification de vos projets</legend><br \>

        @if(empty($lesProjets))

        Vous n'avez pas encore créé de projet. Cliquez {{HTML::link('projet/create', 'ici')}} pour en créer un.

        @else

        @foreach ($lesProjets as $projet)

        <h3> {{$projet['theme']}} </h3><br \><br \>


        {{Form::open(array('url' => '/projet/' . $projet['id'], 'method' => 'PUT','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
        {{ Form::hidden('user', Auth::user()->id) }}

        <!-- INPUT THEME ET NB DE PIECES -->

        <div id="formTheme" class="form-group">
          <label id="labelTheme" class="col-md-2 control-label" for="theme"> Thème du projet </label>
          <div class="col-md-5">
            {{ Form::text('theme', $projet['theme'], array('id'=>'theme', 'class' => 'form-control', 'placeholder'=>'Ex : Star Wars')) }}
          </div>
        </div>


        <div id="formPiece" class="form-group">
          <label id="labelPiece" class="col-md-2 control-label" for="nbPiece">Nombre de pièces </label>
          <div class="col-md-5">
            {{ Form::number('piece', $projet['nb_piece'], array('id'=>'piece', 'class' => 'form-control', 'placeholder'=>'Nombre de pièces de votre projet', 'onblur'=>'checkNbPiece()')) }}
          </div>
        </div>


        <!-- INPUT SUPERFICIE DU PROJET -->


        <div id="formSuperficie" class="form-group">

          <label id="labelSuperficie" class="col-md-2 control-label" for="superficie">Superficie (en mètres)</label>

          <div class="col-md-2">
            {{ Form::text('longueur', $projet['longueur'], array('id'=>'longueur', 'class' => 'form-control', 'placeholder'=>'Longueur', 'onblur'=>'checkLongueur()')) }}
          </div>

          <div class="col-md-1">
            <label class="col-md-2 control-label">x</label>
          </div>

          <div class="col-md-2">
            {{ Form::text('largeur', $projet['largeur'], array('id' => 'largeur', 'class' => 'form-control', 'placeholder'=>'Largeur', 'onblur'=>'checkLargeur()')) }}
          </div>

        </div>


         <!-- INPUT CHOIX ELECTRICITE -->

        @if ($projet['courant'] == 1)

       <div id="formElectricite" class="form-group">
          <label id="labelElectricite" class="col-md-2 control-label" for="elec">Avez-vous besoin d'electricité? </label>
          <div class="col-md-10">
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="1" checked=''>
                Oui
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="0">
                Non
              </label>
            </div>
          </div>
        </div>

        @else

         <div id="formElectricite" class="form-group">
          <label id="labelElectricite" class="col-md-2 control-label" for="elec">Avez-vous besoin d'electricité? </label>
          <div class="col-md-10">
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="1">
                Oui
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="0" checked=''>
                Non
              </label>
            </div>
          </div>
        </div>

        @endif


         <!-- INPUT VALEUR DU DIAPORAMA -->

        <div id="formEstimation" class="form-group">
          <label id="labelEstimation" class="col-md-2 control-label" for="estimation">Estimez la valeur de votre diaporama</label>
          <div class="col-md-3">
            {{ Form::text('estimation', $projet['valeur'], array('id'=>'estimation', 'class' => 'form-control', 'placeholder'=>'0.00', 'onblur'=>'checkEstimation()')) }}
          </div>
          <div class="col-md-1">
            <label id="labelEstimation" class="col-md-2 control-label" for="estimation">€</label>
          </div>
        </div><br \><br \>


         <!-- BOUTON SUBMIT -->

        <div class="form-group">
            <div class="col-md-5">
                {{Form::submit('Mettre à jour', array('class'=>'btn btn-primary', 'id'=>'submit'))}}
                {{Form::close()}}
              </div>
              <div class="col-md-5">
                {{ Form::open(array('url' => 'projet/' . $projet['id'])) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
                {{Form::close()}}
            </div>
          </div> 


        @endforeach

         <div class="form-group">
            <div class="col-md-5">
                <h5> Cliquez {{HTML::link('projet/create', 'ici')}} pour ajouter un projet supplémentaire </h5><br \><br \><br \>
            </div>
          </div>

        @endif

      </fieldset>
    </p>
  </div>




<!-- MODIFICATION INFORMATIONS HEBERGEMENT -->

  <div class="tab-pane fade" id="hebergement">
    <p>
    {{Form::open(array('url' => '/hebergement/' . $unUser -> id, 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
    {{ Form::hidden('user', Auth::user()->id) }}
      <fieldset>
        <legend>Modification de vos informations d'hébergement</legend><br \>

        <div class="col-md-12">
          <h4> Nombre de repas du premier jour </h4><br \>
        </div>

         <div id="formRepas1mid" class="form-group">
          
          <label id="labelRepas1mid" class="col-md-2 control-label" for="repas1mid"> Repas du midi <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas1mid', $unUser -> repas1mid, array('id'=>'repas1mid', 'class' => 'form-control')) }}
          </div>

        </div>


        <div id="formRepas1soir" class="form-group">

          <label id="labelRepas1soir" class="col-md-2 control-label" for="repas1soir"> Repas du soir <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas1soir', $unUser -> repas1soir, array('id'=>'repas1soir', 'class' => 'form-control')) }}
          </div>

        </div><br \>

        <!-- INPUT REPAS DEUXIEME JOUR -->

        <div class="col-md-12">
          <h4> Nombre de repas du deuxième jour </h4><br \>
        </div>


        <div id="formRepas2mid" class="form-group">
          
          <label id="labelRepas2mid" class="col-md-2 control-label" for="repas2mid"> Repas du midi <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas2mid', $unUser -> repas2mid, array('id'=>'repas2mid', 'class' => 'form-control')) }}
          </div>
        </div>


         <div id="formRepas2soir" class="form-group">

          <label id="labelRepas2soir" class="col-md-2 control-label" for="repas2soir"> Repas du soir <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas2soir', $unUser -> repas2soir, array('id'=>'repas2soir', 'class' => 'form-control')) }}
          </div>

        </div><br \><br \>


        <!-- INPUT LISTE ALLERGIES -->

        <div class="form-group">
          <label id="labelAllergies" class="col-md-2 control-label" for="allergies"> Allergies </label>
          <div class="col-md-3">
              <div style="width:200px; height: 70px; overflow-y: scroll;"> 
                <?php
                  $allergies = Allergie::all();
                  foreach ($allergies as $uneAllergie) 
                  {
                    foreach ($usersAllergies as $userAllergie)
                    {
                      if ($userAllergie -> allergie_id == $uneAllergie -> id)
                      {
                        echo '<input name="cbx' . $uneAllergie -> id . '"" type="checkbox" checked="checked" value="' . $uneAllergie -> id . '" /> ' . $uneAllergie -> nom . '<br />';
                      }
                      else
                      {
                        echo '<input name="cbx' . $uneAllergie -> id . '"" type="checkbox" value="' . $uneAllergie -> id . '" /> ' . $uneAllergie -> nom . '<br />';
                      }
                    }
                    
                  }
                  ?>
              </div>
          </div>
        </div><br \> 


         <!-- INPUT BOUTON RADIO HEBERGEMENT -->


         @if($unUser -> internat > 0 || $unUser -> salle > 0)

        <div id="formHebergement" class="form-group">

          <label class="col-md-2 control-label" for="hebergement">Avez-vous besoin d'un hebergement? </label>
          <!-- {{ Form::label('statut',"Vous êtes? *", array('class'=>'col-lg-2 control-label')) }} -->
          <div class="col-md-10">

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergementOui" value="oui" onclick="showHebergement()" checked=''>
                Oui
              </label>
            </div>

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergementNon" value="non" onclick="hideHebergement()">
                Non
              </label>
            </div>
          </div>

        </div><br \>

        @else

        <div id="formHebergement" class="form-group">

          <label class="col-md-2 control-label" for="hebergement">Avez-vous besoin d'un hebergement? </label>
          <!-- {{ Form::label('statut',"Vous êtes? *", array('class'=>'col-lg-2 control-label')) }} -->
          <div class="col-md-10">

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergementOui" value="oui" onclick="showHebergement()">
                Oui
              </label>
            </div>

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergementNon" value="non" onclick="hideHebergement()" checked=''>
                Non
              </label>
            </div>
          </div>

        </div><br \>

        @endif


        <!-- INPUT NOMBRE D'HEBERGEMENTS -->


        <div id="showHebergement" class="form-group" style="display: none;">
          
          <label id="labelInternat" class="col-md-2 control-label" for="internat"> Nombre de lits à l'internat </label>
          <div class="col-md-3">
            {{ Form::number('internat', $unUser -> salle, array('id'=>'lit', 'class' => 'form-control')) }}
          </div>



          <label id="labelSalle" class="col-md-2 control-label" for="salle"> Dans la salle d'exposition </label>
          <div class="col-md-3">
            {{ Form::number('salle', $unUser -> internat, array('id'=>'salle', 'class' => 'form-control')) }}
          </div>
        </div><br \><br \>


         <!-- BOUTON SUBMIT -->

        <div class="form-group">
          <div style="text-align: center;">
            {{Form::submit('Mettre à jour', array('class'=>'btn btn-primary', 'id'=>'submit'))}}
            {{Form::close()}}
          </div>
        </div> <br \><br \>


      </fieldset>
    </p>
  </div>

</div>



<script>

if (document.getElementById('hebergementOui').checked)
{
  document.getElementById('showHebergement').style.display = "block"
}
else if (document.getElementById('hebergementNon').checked)
{
  document.getElementById('showHebergement').style.display = "none"
}

//AFFICHAGE INPUT NOMBRE HEBERGEMENT SI RADIO SUR OUI

  function showHebergement() {
        
    document.getElementById('showHebergement').style.display = "block"

  }


   //DESACTIVE AFFICHAGE INPUT NOMBRE HEBERGEMENT SI RADIO SUR NON

  function hideHebergement() {
        
    document.getElementById('showHebergement').style.display = "none"

  }


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
