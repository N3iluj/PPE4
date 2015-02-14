@extends('template')
@section('contenu')
@parent

<div class="row">
  <div class="col-md-12">
    <div class="well bs-component"><br \><br \>
      <form action="{{ action('RemindersController@postReset') }}" method="POST" onsubmit="return checkForm();"> 
      <input type="hidden" name="token" value="{{ $token }}">
      <fieldset> 

        <legend> Choisissez un nouveau mot de passe </legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>

        <!-- INPUT USER -->

          <div id="formMail" class="form-group">
            <label id="labelMail" class="col-md-2 control-label" for="email"> Adresse e-mail <span style="color: red;">*</span></label>
            <div class="col-md-10">
              {{ Form::email('email', null, array('id'=>'email', 'class' => 'form-control', 'placeholder'=>'Adresse e-mail', 'onblur'=>'checkMail()', 'data-toggle'=>'email')) }}
            </div>
          </div><br \><br \>


          <!-- INPUT COMPARAISON PASSWORD -->


          <div id="formPass" class="form-group">

            <label class="col-md-2 control-label" for="password">Mot de passe <span style="color: red;">*</span></label>
            <div class="col-md-4">
              {{ Form::password('password', array('id' => 'password', 'class' => 'form-control',  'title'=>'Le mot de passe doit contenir au moins 8 caractères', 'placeholder'=>'Mot de passe', 'onkeydown'=>'checkPass1()', 'data-toggle'=>'password')) }}
            </div>

            <label id="labelPass2" class="col-md-2 control-label" for="password_confirmation">Verifiez le mot de passe <span style="color: red;">*</span></label>
            <div class="col-md-4">
              {{ Form::password ('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'title'=>'Les mots de passe doivent correspondre', 'placeholder'=>'Confirmez votre mot de passe', 'onkeyup'=>'check2Pass()', 'data-toggle'=>'password_confirmation')) }}
            </div>

          </div><br \><br \><br \><br \> 



          <!-- BOUTON SUBMIT -->

          <div class="form-group">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center;">
              {{ Form::submit('Envoyer', array('class'=>'btn btn-primary', 'value'=>"Send Reminder")) }}
              {{Form::close()}} 
            </div>
            <div class="col-md-4"></div>
          </div><br \><br \><br \><br \><br \>


        </fieldset>
    </div>
  </div>
</div>



  <script>


  //VERIFICATION ADRESSE EMAIL

  function checkMail() {
        
    var mail = document.getElementById('email').value;

    var regEmail = new RegExp('^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$','i');
            
    if(regEmail.test(mail)) {

      document.getElementById("formMail").className = "form-group"
            
      return true;

    } else {

      document.getElementById("formMail").className = "form-group has-error"
            
      return false;
    
    }

  }



  //VERIFICATION VALIDITE MOT DE PASSE 1

  function checkPass1() {

    var pass = document.getElementById('password').value;

    var regPass = new RegExp('^[0-9A-Za-z._-]{8,}$','i');

    if(regPass.test(pass))
    {

      $('[data-toggle="password"]').tooltip('hide')

      document.getElementById("formPass").className = "form-group"

      return true;
    }
    else
    {

      $('[data-toggle="password"]').tooltip('show')

      document.getElementById("formPass").className = "form-group has-error"

      return false;

    }
  }

  //VERIFICATION CORRESPONDANCE MOT DE PASSE

  function check2Pass() {

    var x = document.getElementById("password").value;
    var y = document.getElementById("password_confirmation").value;

    if (x == y)
    {

      $('[data-toggle="password_confirmation"]').tooltip('hide')

      document.getElementById("labelPass2").style.color = "black"
    
      return true;
    }
    else
    {

      $('[data-toggle="password_confirmation"]').tooltip('show')

      document.getElementById("labelPass2").style.color = "red"
    
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
