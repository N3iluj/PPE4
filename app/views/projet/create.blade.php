@extends('template')
@section('contenu')
@parent


<div class="row">
  <div class="col-md-12">
  <div class="well bs-component"><br \>
    {{Form::open(array('url' => 'projet', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
    {{ Form::hidden('user', Auth::user()->id) }}
      <fieldset>
        <legend>Inscription du projet</legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>


        <!-- INPUT THEME ET NB DE PIECES -->

        <div class="form-group">
          <label id="labelTheme" class="col-md-2 control-label" for="theme"> Thème du projet <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::text('theme', null, array('id'=>'theme', 'class' => 'form-control', 'placeholder'=>'Ex : Star Wars')) }}
          </div>



          <label id="labelPiece" class="col-md-2 control-label" for="nbPiece">Nombre de pièces <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::number('piece', null, array('id'=>'piece', 'class' => 'form-control', 'placeholder'=>'Nombre de pièces de votre projet', 'onblur'=>'checkNbPiece()')) }}
          </div>
        </div>


        <!-- INPUT SUPERFICIE DU PROJET -->


        <div id="formSuperficie" class="form-group">

          <label id="labelSuperficie" class="col-md-2 control-label" for="superficie">Superficie (en mètres) <span style="color: red;">*</span></label>

          <div class="col-md-2">
            {{ Form::text('longueur', null, array('id'=>'longueur', 'class' => 'form-control', 'placeholder'=>'Longueur', 'onblur'=>'checkLongueur()')) }}
          </div>

          <div class="col-md-1">
            <label class="col-md-2 control-label">x</label>
          </div>

          <div class="col-md-2">
            {{ Form::text('largeur', null, array('id' => 'largeur', 'class' => 'form-control', 'placeholder'=>'Largeur', 'onblur'=>'checkLargeur()')) }}
          </div>

        </div>


        <!-- INPUT CHOIX ELECTRICITE -->

       <div id="formElectricite" class="form-group">
          <label id="labelElectricite" class="col-md-2 control-label" for="elec">Avez-vous besoin d'electricité? <span style="color: red;">*</span></label>
          <div class="col-md-10">
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="1" checked=''>
                Oui
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="elec" value="0">
                Non
              </label>
            </div>
          </div>
        </div>



        <!-- INPUT VALEUR DU DIAPORAMA -->

        <div id="formEstimation" class="form-group">
          <label id="labelEstimation" class="col-md-2 control-label" for="estimation">Estimez la valeur de votre diaporama <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::text('estimation', null, array('id'=>'estimation', 'class' => 'form-control', 'placeholder'=>'0.00', 'onblur'=>'checkEstimation()')) }}
          </div>
          <div class="col-md-1">
            <label id="labelEstimation" class="col-md-2 control-label" for="estimation">€</label>
          </div>
        </div><br \><br \>



        <!-- BOUTON SUBMIT -->

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


    //VERIFICATION VALIDITE NB DE PIECES

    function checkNbPiece() {
        
    var piece = document.getElementById('piece').value;

    var regPiece = new RegExp('^[0-9]{2,30}$','i');
            
    if(regPiece.test(piece)) {

      document.getElementById("labelPiece").style.color = "black"
            
      return true;

    } else {

       document.getElementById("labelPiece").style.color = "red"
            
      return false;
    
    }

  }



  //VERIFICATION VALIDITE SUPERFICIE LONGEUR

  function checkLongueur() {

    var longueur = document.getElementById('longeur').value;

    var regSuperficie = new RegExp('^[0-9]{1,}(\.|)[0-9]{0,5}$','i')

    if(regSuperficie.test(longeur))
    {

      document.getElementById("formSuperficie").className = "form-group"

      return true;
    }
    else
    {

      document.getElementById("formSuperficie").className = "form-group has-error"

      return false;

    }
  }

    //VERIFICATION VALIDITE SUPERFICIE

  function checkLargeur() {

    var largeur = document.getElementById('largeur').value;

    var regSuperficie = new RegExp('^[0-9]{1,}(\.|)[0-9]{0,5}$','i')

    if(regSuperficie.test(largeur))
    {

      document.getElementById("formSuperficie").className = "form-group"

      return true;
    }
    else
    {

      document.getElementById("formSuperficie").className = "form-group has-error"

      return false;

    }
  }


  //VERIFICATION VALIDITE  ESTIMATION

  function checkEstimation() {

    var estimation = document.getElementById('estimation').value;

    var regEstimation = new RegExp('^[0-9]{1,}(\.|)[0-9]{0,2}$','i')

    if(regEstimation.test(estimation))
    {

      document.getElementById("formEstimation").className = "form-group"

      return true;
    }
    else
    {

      document.getElementById("formEstimation").className = "form-group has-error"

      return false;

    }
  }

  
  //VERIFIE LA VALIDITE DES CHAMPS OBLIGATOIRE DU FORM


function checkForm() {

  if (checkNbPiece() == true && checkLongueur() == true && checkLargeur() == true)
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

