@extends('template')
@section('contenu')
@parent


<div class="row">
  <div class="col-md-12">
  <div class="well bs-component"><br \>
    {{Form::open(array('url' => 'hebergement', 'method' => 'POST','class'=>'form-horizontal'))}}
    {{ Form::hidden('user', Auth::user()->id) }}
      <fieldset>
        <legend>Inscription aux repas et à l'hébergement</legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>


        <!-- INPUT REPAS PREMIER JOUR -->

        <div class="col-md-12">
        	<h5> Nombre de repas du premier jour </h5><br \>
        </div>


        <div class="form-group">
        	
          <label id="labelRepas1mid" class="col-md-2 control-label" for="repas1mid"> Repas du midi <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas1mid', 0, array('id'=>'repas1mid', 'class' => 'form-control')) }}
          </div>



          <label id="labelRepas1soir" class="col-md-2 control-label" for="repas1soir"> Repas du soir <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas1soir', 0, array('id'=>'repas1soir', 'class' => 'form-control')) }}
          </div>
        </div><br \>



        <!-- INPUT REPAS DEUXIEME JOUR -->

        <div class="col-md-12">
        	<h5> Nombre de repas du deuxième jour </h5><br \>
        </div>


        <div class="form-group">
        	
          <label id="labelRepas2mid" class="col-md-2 control-label" for="repas2mid"> Repas du midi <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas2mid', 0, array('id'=>'repas2mid', 'class' => 'form-control')) }}
          </div>



          <label id="labelRepas2soir" class="col-md-2 control-label" for="repas2soir"> Repas du soir <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('repas2soir', 0, array('id'=>'repas2soir', 'class' => 'form-control')) }}
          </div>
        </div><br \><br \>





        <!-- INPUT LISTE ALLERGIES -->

        <div class="form-group">
        	<label id="labelAllergies" class="col-md-2 control-label" for="allergies"> Allergies </label>
        	<div class="col-md-3">
            	<div style="width:200px; height: 70px; overflow-y: scroll;"> 
                <?php
                  $allergies = Allergie::all();
                  foreach ($allergies as $uneAllergie) 
                  {
                    echo '<input name="cbx' . $uneAllergie -> id . '"" type="checkbox" value="' . $uneAllergie -> id . '" /> ' . $uneAllergie -> nom . '<br />';
                  }
                  ?>
				      </div>
          </div>
      	</div><br \> 

        


      	 <!-- INPUT BOUTON RADIO HEBERGEMENT -->


        <div id="formHebergement" class="form-group">

          <label class="col-md-2 control-label" for="hebergement">Avez-vous besoin d'un hebergement? <span style="color: red;">*</span></label>
          <!-- {{ Form::label('statut',"Vous êtes? *", array('class'=>'col-lg-2 control-label')) }} -->
          <div class="col-md-10">

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergement" value="oui" onclick="showHebergement()">
                Oui
              </label>
            </div>

            <div class="radio">
              <label>
                <input type="radio" name="hebergement" id="hebergement" value="non" onclick="hideHebergement()" checked=''>
                Non
              </label>
            </div>
          </div>

        </div><br \>





        <!-- INPUT NOMBRE D'HEBERGEMENTS -->


        <div id="showHebergement" class="form-group" style="display: none;">
        	
          <label id="labelInternat" class="col-md-2 control-label" for="internat"> Nombre de lits à l'internat </label>
          <div class="col-md-3">
            {{ Form::number('internat', 0, array('id'=>'lit', 'class' => 'form-control')) }}
          </div>



          <label id="labelSalle" class="col-md-2 control-label" for="salle"> Dans la salle d'exposition </label>
          <div class="col-md-3">
            {{ Form::number('salle', 0, array('id'=>'salle', 'class' => 'form-control')) }}
          </div>
        </div><br \><br \>







        <!-- BOUTON SUBMIT -->

        <div class="form-group">
          <div style="text-align: center;">
            {{Form::submit('Terminer', array('class'=>'btn btn-primary', 'id'=>'submit'))}}
            {{Form::close()}}
          </div>
        </div> <br \><br \>


      </fieldset>
    </div>      
  </div>



<script>



 //AFFICHAGE INPUT NOMBRE HEBERGEMENT SI RADIO SUR OUI

  function showHebergement() {
        
    document.getElementById('showHebergement').style.display = "block"

  }





   //DESACTIVE AFFICHAGE INPUT NOMBRE HEBERGEMENT SI RADIO SUR NON

  function hideHebergement() {
        
    document.getElementById('showHebergement').style.display = "none"

  }




</script>

@stop

