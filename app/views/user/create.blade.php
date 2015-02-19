@extends('template')
@section('contenu')
@parent



<div class="row">
  <div class="col-md-12">
  <div class="well bs-component"><br \>
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Inscription de l'exposant</legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>


        <!-- INPUT MAIL ET PSEUDO -->


        <div id="formMail" class="form-group">
          <label id="labelMail" class="col-md-2 control-label" for="mail"> Adresse e-mail <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::email('mail', null, array('id'=>'mail', 'class' => 'form-control', 'placeholder'=>'Adresse e-mail', 'onblur'=>'checkMail()', 'data-toggle'=>'mail', 'data-placement'=>'right', 'data-content'=>"L'adresse e-mail doit être valide" )) }}
          </div>

          <label id="labelPseudo" class="col-md-2 control-label" for="pseudo">Pseudo </label>
          <div class="col-md-3">
            {{ Form::text('pseudo', null, array('id'=>'pseudo', 'class' => 'form-control', 'data-content'=>'Le pseudo doit être inférieur à 20 caractères, contenir plus de 2 lettres et moins de 4 chiffres', 'data-placement'=>'right','placeholder'=>'Pseudo', 'onblur'=>'checkPseudo()', 'data-toggle'=>'pseudo')) }}
          </div>
        </div>


        <!-- INPUT COMPARAISON PASS -->


        <div id="formPass" class="form-group">

          <label class="col-md-2 control-label" for="pass1">Mot de passe <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::password('pass1', array('id' => 'pass1', 'class' => 'form-control', 'placeholder'=>'Mot de passe', 'onkeydown'=>'checkPass1()', 'data-placement'=>'right', 'data-content'=>"Le mot de passe doit contenir au moins 8 caractères", 'data-toggle'=>'pass1')) }}
          </div>

          <label id="labelPass2" class="col-md-2 control-label" for="pass2">Verifiez le mot de passe <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::password ('pass2', array('id' => 'pass2', 'class' => 'form-control', 'data-content'=>'Les mots de passe ne correspondent pas', 'data-placement'=>'right', 'placeholder'=>'Confirmez votre mot de passe', 'onkeyup'=>'check2Pass()', 'data-toggle'=>'pass2')) }}
          </div>

        </div>




        <div id="formNom" class="form-group">

          <label id="labelNom" class="col-md-2 control-label" for="nom">Nom <span style="color: red;">*</span></label>
          <!-- {{ Form::label('nom','Nom *', array('class'=>'col-md-2 control-label')) }} -->
          <div class="col-md-3">
            {{ Form::text('nom', null, array('id'=>'nom', 'class' => 'form-control', 'placeholder'=>'Nom', 'onkeydown'=>'checkNom()')) }}
          </div>

          <label id="labelPrenom" class="col-md-2 control-label" for="prenom">Prénom <span style="color: red;">*</span></label>
          <!--{{ Form::label('prenom','Prenom *', array('class'=>'col-md-2 control-label')) }}-->
          <div class="col-md-3">
            {{ Form::text('prenom', null, array('id'=>'prenom', 'class' => 'form-control', 'placeholder'=>'Prénom', 'onkeydown'=>'checkPrenom()')) }}
          </div>

        </div>

        <!-- INPUT DATE DE NAISSANCE -->


        <div class="form-group">

          {{ Form::label('dateNaissance','Date de naissance', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-2">
            {{ Form::number('dateJ', 1, array('class'=>'form-control', 'onfocus'=>'this.select()')) }}
          </div>

           <div class="col-md-3">
            {{ Form::select('dateM', array('01' => 'Janvier', '02' => 'Février', '03' => 'Mars', '04' => 'Avril', '05' => 'Mai', '06' => 'Juin', '07' => 'Juillet', '08' => 'Août', '09' => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'), null, array('class'=>'form-control')) }}
          </div>

          <div class="col-md-3">
            {{ Form::number('dateA', 2000, array('class'=>'form-control', 'onfocus'=>'this.select()')) }}
          </div>

        </div>



        <!-- INPUT BOUTON RADIO CHOIX STATUT EXPOSANT OU VENDEUR -->


        <div id="formStatut" class="form-group">

          <label class="col-md-2 control-label" for="statut">Vous êtes? <span style="color: red;">*</span></label>
          <!-- {{ Form::label('statut',"Vous êtes? *", array('class'=>'col-lg-2 control-label')) }} -->
          <div class="col-md-10">

            <div class="radio">
              <label>
                <input type="radio" name="statut" id="statut" value="exposant" checked=''>
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

        </div>



        <div class="form-group">

          {{ Form::label('adresse','Adresse', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-3">
            {{ Form::text('adresse', null, array('class' => 'form-control', 'placeholder'=>'Adresse')) }}
          </div>

          {{ Form::label('cp','Code Postal', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-3">
            {{ Form::text('cp', null, array('class' => 'form-control', 'placeholder'=>'Code Postal')) }}
          </div>

        </div>


        <div class="form-group">
          {{ Form::label('ville','Ville', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-8">
            {{ Form::text('ville', null, array('class' => 'form-control', 'placeholder'=>'Ville')) }}
          </div>
        </div>

        <div id="formTel" class="form-group">
          {{ Form::label('tel','Téléphone', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-8">
            {{ Form::text('tel', null, array('id'=>'tel', 'class' => 'form-control', 'placeholder'=>'Numéro de téléphone')) }}
          </div>
        </div>


        <!-- INPUT CHECK BOX CHECK ACCEPTATION CGU -->


        <div class="form-group">
          <div style="text-align: center;">
            <div class="checkbox">
              <label id="labelCgu">
                {{Form::checkbox('cgu', 1, false, array('id'=>'cgu', 'data-placement'=>'top', 'data-content'=>'Vous devez accepter les conditions pour continuer', 'onchange'=>'checkCgu()', 'data-toggle'=>'cgu'))}} J'accepte les {{HTML::link('cgu', "Conditions Générales d'Utilisation")}}.
              </label>
            </div>
          </div>
        </div> <br \>


        <!-- INPUT CHECK BOX CHECK ACCEPTATION CGU -->

        <div class="form-group">
          <div style="text-align: center;">
            {{Form::submit('Suivant', array('class'=>'btn btn-primary', 'id'=>'submit'))}}
            {{Form::close()}}
          </div>
        </div> <br \><br \>

      </fieldset>
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



  //VERIFICATION VALIDITE MOT DE PASSE 1

  function checkPass1() {

    var pass = document.getElementById('pass1').value;

    var regPass = new RegExp('^[0-9A-Za-z._-]{8,}$','i');

    if(regPass.test(pass))
    {

      $('[data-toggle="pass1"]').popover('hide')

      document.getElementById("formPass").className = "form-group"

      return true;
    }
    else
    {

      $('[data-toggle="pass1"]').popover('show')

      document.getElementById("formPass").className = "form-group has-error"

      return false;

    }
  }

  //VERIFICATION CORRESPONDANCE MOT DE PASSE

  function check2Pass() {

    var x = document.getElementById("pass1").value;
    var y = document.getElementById("pass2").value;

    if (x == y)
    {

      $('[data-toggle="pass2"]').popover('hide')

      document.getElementById("labelPass2").style.color = "black"
    
      return true;
    }
    else
    {

      $('[data-toggle="pass2"]').popover('show')

      document.getElementById("labelPass2").style.color = "red"
    
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


  //VERIFICATION CGU COCHE

  function checkCgu() {

    var cgu = document.getElementById("cgu").checked;

    if (cgu == true)
    {

      $('[data-toggle="pass2"]').popover('hide')

      return true;
    }
    else

    {
      $('[data-toggle="cgu"]').popover('show')
      return false;
    }

  }


  //VERIFIE LA VALIDITE DES CHAMPS OBLIGATOIRE DU FORM


function checkForm() {

  if (checkMail() == true && checkPass1() == true && check2Pass() == true && checkNom() == true && checkPrenom() == true && checkCgu() == true)
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