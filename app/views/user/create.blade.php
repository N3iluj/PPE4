@extends('template')
@section('contenu')
@parent


{{HTML::style('css/datepicker.css')}}
{{HTML::script('js/jquery-2.1.1.min.js') }}
{{HTML::script('js/bootstrap-datepicker.js') }}

<script>
    
$(document).ready(function(){
    $("#javascript").click(function(){
        alert( "#cg");
    });
});
</script>

<div class="row">
  <div class="well bs-component">
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal'))}}
      <fieldset>
        <legend>Inscription</legend>
        <div class="form-group">
          {{ Form::label('nom','Nom', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('nom', null, array('class' => 'form-control', 'placeholder'=>'Nom')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('prenom','Prenom', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('prenom', null, array('class' => 'form-control', 'placeholder'=>'Prenom')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('dateNaissance','Date de naissance', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('dateNaissance', null, array('class' => 'form-control', 'id'=>'datepicker', 'placeholder'=>'Date de naissance')) }}
          </div>
        </div>

         <!-- DEBUT SCRIPT DATEPICKER -->
        <script>
          $('#datepicker').datepicker({
            format: 'dd/mm/yyyy',
          })

        </script>
          <!-- FIN SCRIPT DATEPICKER -->

        <div class="form-group">
          {{ Form::label('adresse','Adresse', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('adresse', null, array('class' => 'form-control', 'placeholder'=>'Adresse')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('cp','Code Postal', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('cp', null, array('class' => 'form-control', 'placeholder'=>'Code Postal')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('ville','Ville', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('ville', null, array('class' => 'form-control', 'placeholder'=>'Ville')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('email','Email', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::email('email', null, array('class' => 'form-control', 'placeholder'=>'Email')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('pseudo','Pseudo', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('pseudo', null, array('class' => 'form-control', 'placeholder'=>'Pseudo')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('password','Mot de passe', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::password('password', array('class' => 'form-control', 'placeholder'=>'Mot de passe')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('mdp2','Retapez votre mot de passe', array('class'=>'col-md-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::password ('mdp2', array('class' => 'form-control', 'placeholder'=>'Retapez votre mot de passe')) }}
          </div>
        </div>
        <div class="form-group">
          <div style="text-align: center;">
         
            <input type="checkbox"> J'accepte les
<div id ="javascript"><p> conditions générales d'utilisation.</p> </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            {{Form::submit('Suivant', array('class'=>'btn btn-primary'))}}
            {{Form::close()}}
          </div>
         
    </div>
  </fieldset>
</form>
</div>
</div>

@stop