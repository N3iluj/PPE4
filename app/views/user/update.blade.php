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
        <li class="active"><a href="#">Mon profil </a></li>
         @if (Auth::check())
            @if((Auth::user()->statut=="admin"))
                <li><a href="#">Administration</a></li>
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
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Modification de vos informations</legend><br \><br \><br \>


         <div id="formMail" class="form-group">
          <label id="labelMail" class="col-md-2 control-label" for="mail"> Adresse e-mail <span style="color: red;">*</span></label>
            {{ Form::email('mail', null, array('id'=>'mail', 'class' => 'form-control', 'placeholder'=>'Adresse e-mail', 'onblur'=>'checkMail()', 'data-toggle'=>'mail', 'data-placement'=>'right', 'data-content'=>"L'adresse e-mail doit être valide" )) }}
        </div>

          <div id="formPseudo" class="form-group">
          <label id="labelPseudo" class="col-md-2 control-label" for="pseudo">Pseudo </label>
            {{ Form::text('pseudo', null, array('id'=>'pseudo', 'class' => 'form-control', 'data-content'=>'Le pseudo doit être inférieur à 20 caractères, contenir plus de 2 lettres et moins de 4 chiffres', 'data-placement'=>'right','placeholder'=>'Pseudo', 'onblur'=>'checkPseudo()', 'data-toggle'=>'pseudo')) }}
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

@stop
