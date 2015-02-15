@extends('template')
@section('contenu')
@parent

<div class="row">
    <div class="well bs-component"><br \>
      {{Form::open(array('url' => 'auth/login', 'method' => 'POST','class'=>'form-horizontal'))}} 
      <fieldset> 

        <legend> Exposition Lego® - Dole 2015 </legend><br \><br \><br \><br \>

        <!-- INPUT USER -->

          <div id="user" class="form-group">
            <div class="col-md-4"></div>  
            <div class="col-md-4">
            {{ Form::text('user', null, array('class' => 'form-control', 'placeholder'=>'Adresse e-mail ou pseudo')) }}
            </div>
            <div class="col-md-4"></div>  
          </div>

          <!-- INPUT PASSWORD -->

           <div id="pass" class="form-group">
            <div class="col-md-4"></div>  
            <div class="col-md-4">
            {{ Form::password ('password', array('class' => 'form-control', 'placeholder'=>'Mot de passe')) }}
            </div>
            <div class="col-md-4"></div>  
          </div><br \><br \><br \>

          <!-- BOUTON SUBMIT -->

          <div class="form-group">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="text-align: center;">
              {{ Form::submit('Envoyer', array('class'=>'btn btn-primary')) }}
              {{Form::close()}} 
            </div>
            <div class="col-md-4"></div>
          </div><br \>

          <!-- LIENS INSCRIPTION ET MOT DE PASSE OUBLIE -->

          <div class="form-group">
              <p style="text-align: center;">{{HTML::link('user/create', "Inscription", array('style'=>'color: #158cba'))}}</p>
              <p style="text-align: center;">{{HTML::link('password/remind', 'Mot de passe oublié?', array('style'=>'color: #158cba'))}}</p>
          </div><br \><br \>

        </fieldset>
    </div>
</div>


@stop
