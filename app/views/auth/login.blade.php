@extends('template')

<a href={{asset('user/create')}} style="color: white;"><div class="alert alert-dismissable alert-info" style="border-radius: 0px;">
  <h4 style="text-align: center; text-transform: uppercase;">Inscriptions exposants - Dole 2015</h4>
  <p style="text-align: center;"> Pour vous inscrire, cliquez sur la bannière .</p>
</div></a>

@section('contenu')
@parent

<div class="row">
  <div class="col-lg-4">
  </div>
  <div class="col-lg-4">
    <div class="well bs-component">
      {{Form::open(array('url' => 'auth/login', 'method' => 'POST','class'=>'form-horizontal'))}}
        <fieldset>
          <legend>Connexion</legend>
          <div class="form-group">
            <div class="col-md6-offset-3">
              {{ Form::text('username', null, array('class' => 'form-control', 'placeholder'=>'Pseudo')) }}
            </div>
          </div>
          <div class="form-group">
            <div class="col-md6-offset-3">
              {{ Form::password ('password', array('class' => 'form-control', 'placeholder'=>'Mot de passe')) }}
            </div>
          </div>
          <div class="form-group">
            <div style="text-align: center;">
              {{ Form::submit('Envoyer', array('class'=>'btn btn-primary')) }}
            </div>
          </div>
          <div class="form-group">
            <div class="col-md6-offset-3" style="text-align: center;">
              {{HTML::link('user/create', 'Pas encore inscrit?', array('style'=>'color: #158cba'))}}
            </div>
            <div class="col-md6-offset-3" style="text-align: center;">
              {{HTML::link('mdpOublie', 'Mot de passe oublié?', array('style'=>'color: #158cba'))}}
            </div>
          </div>
        </fieldset>
      {{Form::close()}}
    </div>
    <br \>
    <div class="imgLego" style="text-align: center;">
      {{ HTML::image('img/login_lego.jpg', $alt="Lego®", $attributes = array()) }}
    </div>
  </div>

@stop
