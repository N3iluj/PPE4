@extends('template')
@section('contenu')
@parent



<div class="row">
  <div class="col-md-12">
  <div class="well bs-component"><br \><br \>
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Inscription</legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>

        <div id="formMail" class="form-group">
          <label class="col-md-2 control-label" for="mail"> Adresse mail <span style="color: red;">*</span></label>
          <!--{{ Form::label('mail','Adresse mail *', array('class'=>'col-md-2 control-label')) }}-->
          <div class="col-md-8">
            {{ Form::email('mail', null, array('id'=>'mail', 'class' => 'form-control', 'placeholder'=>'Adresse mail', 'onblur'=>'checkForm().checkMail()')) }}
          </div>
        </div>


        <div id="formPass" class="form-group">

          <label class="col-md-2 control-label" for="pass1">Mot de passe <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::password('pass1', array('id' => 'pass1', 'class' => 'form-control',  'title'=>'Le mot de passe doit contenir au moins 8 caractères', 'placeholder'=>'Mot de passe', 'onblur'=>'checkForm().checkPass1()')) }}
          </div>

          <label id="labelPass2" class="col-md-2 control-label" for="pass2">Retapez le mot de passe <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::password ('pass2', array('id' => 'pass2', 'class' => 'form-control', 'title'=>'Les mots de passe doivent correspondre', 'placeholder'=>'Retapez votre mot de passe', 'onblur'=>'checkForm().check2Pass()')) }}
          </div>

        </div>


        <div id="formNom" class="form-group">

          <label id="labelNom" class="col-md-2 control-label" for="nom">Nom <span style="color: red;">*</span></label>
          <!-- {{ Form::label('nom','Nom *', array('class'=>'col-md-2 control-label')) }} -->
          <div class="col-md-3">
            {{ Form::text('nom', null, array('id'=>'nom', 'class' => 'form-control', 'placeholder'=>'Nom', 'onblur'=>'checkForm().checkNom()')) }}
          </div>

          <label id="labelPrenom" class="col-md-2 control-label" for="prenom">Prénom <span style="color: red;">*</span></label>
          <!--{{ Form::label('prenom','Prenom *', array('class'=>'col-md-2 control-label')) }}-->
          <div class="col-md-3">
            {{ Form::text('prenom', null, array('id'=>'prenom', 'class' => 'form-control', 'placeholder'=>'Prénom', 'onblur'=>'checkForm().checkPrenom()')) }}
          </div>

        </div>


        <div class="form-group">

          {{ Form::label('dateNaissance','Date de naissance', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-2">
            {{ Form::number('dateJ', 1, array('class'=>'form-control')) }}
          </div>

           <div class="col-md-3">
            {{ Form::select('dateM', array(1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril', 5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août', 9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre', ), null, array('class'=>'form-control')) }}
          </div>

          <div class="col-md-3">
            {{ Form::number('dateA', 2000, array('class'=>'form-control')) }}
          </div>

        </div>



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
            {{ Form::text('tel', null, array('id'=>'tel', 'class' => 'form-control', 'placeholder'=>'Numero de téléphone')) }}
          </div>
        </div>


        <div class="form-group">
          <div style="text-align: center;">
            <div class="checkbox">
              <label>
                {{Form::checkbox('cgu', 'value', false, array('id'=>'cgu', 'onchange'=>'checkForm().checkCgu()'))}} J'accepte les {{HTML::link('cgu', "Conditions Générales d'Utilisation")}}.
              </label>
            </div>
          </div>
        </div> <br \>

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

//DESACTIVE LE BOUTON SUBMIT (VOIR CHECKCGU FUNCTION)//
document.getElementById("submit").disabled = true;


function checkForm() {

  //VERIFICATION ADRESSE EMAIL

  function checkMail() {
        
    var mail = document.getElementById('mail').value;

    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
            
    if(regEmail.test(mail)) {

      document.getElementById("formMail").className = "form-group"
            
      return true;

    } else {

      document.getElementById("formMail").className = "form-group has-error"
            
      return false;
    
    }

  };

  //VERIFICATION VALIDITE MOT DE PASSE 1

  function checkPass1() {

    var pass = document.getElementById('pass1').value;

    var regPass = new RegExp('^[0-9A-Za-z._-]{8,}$','i');

    if(regPass.test(pass))
    {
      document.getElementById("formPass").className = "form-group"

      return true;
    }
    else
    {

      document.getElementById("formPass").className = "form-group has-error"

      return false;

    }
  };

  //VERIFICATION CORRESPONDANCE MOT DE PASSE

  function check2Pass() {

    var x = document.getElementById("pass1").value;
    var y = document.getElementById("pass2").value;

    if (x == y)
    {
      document.getElementById("labelPass2").style.color = "black"
    
      return true;
    }
    else
    {
      document.getElementById("labelPass2").style.color = "red"
    
      return false;

    }
  };

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
  };

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
  };


  //VERIFICATION CGU COCHE

  function checkCgu() {

    var cgu = document.getElementById("cgu").checked;

    if (cgu == true)
    {
      return true;
    }
    else
    {
      return false;
    }

  };


  //DEBUT FONCTION CHECKFORM


  if (checkCgu() == true)
  {
    document.getElementById("submit").disabled = false;
  }
  else
  {
    document.getElementById("submit").disabled = true;
  }



  if (checkMail() == true && checkPass1() == true && check2Pass() == true && checkNom() == true && checkPrenom() == true)
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