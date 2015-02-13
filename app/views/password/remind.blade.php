@extends('template')
@section('contenu')
@parent

<div class="row">
    <div class="well bs-component"><br \><br \>
      <form action="{{ action('RemindersController@postRemind') }}" method="POST" onsubmit="return checkMail();"> 
      <fieldset> 

        <legend> Récupération de mot de passe </legend><br \><br \><br \>

        <!-- INPUT USER -->

          <div id="formMail" class="form-group">
            <div class="col-md-4"></div>  
            <div class="col-md-4">
            {{ Form::email('email', null, array('id'=>'email', 'class' => 'form-control', 'title'=>'Entrez une adresse mail valide', 'placeholder'=>'Entrez votre adresse e-mail')) }}
            </div>
            <div class="col-md-4"></div>  
          </div><br \><br \>

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

  </script>


@stop
