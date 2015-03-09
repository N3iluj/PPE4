@extends('template')
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
      </fieldset>
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
