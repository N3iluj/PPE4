@extends('template')
@section('contenu')
@parent

{{HTML::script('js/jquery-2.1.1.min.js') }}
{{HTML::script('js/bootstrap-datepicker.js') }}

<div class="row">
  <div class="well bs-component">
    {{Form::open(array('url' => 'user', 'method' => 'POST','class'=>'form-horizontal'))}}
      <fieldset>
        <legend>Projet</legend>
        <div class="form-group">
          {{ Form::label('theme','Thème du diaporama', array('class'=>'col-lg-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('theme', null, array('class' => 'form-control', 'placeholder'=>'Thème du diaporama')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('superficie','Superficie', array('class'=>'col-lg-2 control-label')) }}
          <div class="col-md-3">
            {{ Form::text('longueur', null, array('class' => 'form-control', 'placeholder'=>'Longeur (en mètres)')) }}
          </div>
          <div class="col-md-3">
            {{ Form::text('largeur', null, array('class' => 'form-control', 'placeholder'=>'Largeur (en mètres)')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('nbPiece','Nombre de pièces', array('class'=>'col-lg-2 control-label')) }}
          <div class="col-md-10">
            {{ Form::text('nbPiece', null, array('class' => 'form-control', 'placeholder'=>'Nombre de pièces')) }}
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('elec',"Avez-vous besoin d'électricité?", array('class'=>'col-lg-2 control-label')) }}
          <div class="col-md-10">
            <div class="radio">
              <label>
                <input type="radio" name="elecTrue" id="optionsRadios1" value="elecTrue" checked="">
                Oui
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="elecFalse" id="optionsRadios2" value="elecFalse">
                Non
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          {{ Form::label('valeur','Estimez la valeur de votre diaporama (en €)', array('class'=>'col-lg-2 control-label')) }}
          <div class="col-lg-10">
            {{ Form::text('valeur', null, array('class' => 'form-control', 'placeholder'=>'0.00')) }}
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-4"></div>
          <div class="col-lg-4"></div>
          <div class="col-lg-4">
            {{Form::submit('Suivant', array('class'=>'btn btn-primary'))}}
            {{Form::close()}}
          </div>
        </div>
      </fieldset>
    </form>
  </div>
</div>

@stop