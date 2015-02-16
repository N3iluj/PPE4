@extends('template')
@section('contenu')
@parent


<div class="row">
  <div class="col-md-12">
  <div class="well bs-component"><br \>
    {{Form::open(array('url' => 'projet', 'method' => 'POST','class'=>'form-horizontal', 'onsubmit'=>'return checkForm();'))}}
      <fieldset>
        <legend>Projet</legend><span style="color: red;">*</span> : champs obligatoires<br \><br \><br \>


        <!-- INPUT THEME ET NB DE PIECES -->

        <div class="form-group">
          <label id="labelTheme" class="col-md-2 control-label" for="theme"> Thème du projet <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::text('theme', null, array('id'=>'theme', 'class' => 'form-control', 'placeholder'=>'Ex : Star Wars', 'onblur'=>'checkTheme()')) }}
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
            {{ Form::text('longueur', null, array('id'=>'longeur', 'class' => 'form-control', 'placeholder'=>'Longeur', 'onblur'=>'checkSuperficie()')) }}
          </div>

          <div class="col-md-1">
            <label class="col-md-2 control-label">x</label>
          </div>

          <div class="col-md-2">
            {{ Form::text('largeur', null, array('class' => 'form-control', 'placeholder'=>'Largeur')) }}
          </div>

        </div>


        <!-- INPUT CHOIX ELECTRICITE -->

       <div id="formElectricite" class="form-group">
          <label id="labelElectricite" class="col-md-2 control-label" for="elec">Avez-vous besoin d'electricité? <span style="color: red;">*</span></label>
          <div class="col-md-10">
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="optionsRadios1" value="elecTrue" checked="">
                Oui
              </label>
            </div>
            <div class="radio">
              <label>
                <input type="radio" name="elec" id="optionsRadios2" value="elecFalse">
                Non
              </label>
            </div>
          </div>
        </div>



        <!-- INPUT VALEUR DU DIAPORAMA -->

        <div id="formValeur" class="form-group">
          <label id="labelValeur" class="col-md-2 control-label" for="valeur">Estimez la valeur de votre diaporama <span style="color: red;">*</span></label>
          <div class="col-md-3">
            {{ Form::text('valeur', null, array('id'=>'valeur', 'class' => 'form-control', 'placeholder'=>'0.00')) }}
          </div>
          <div class="col-md-1">
            <label id="labelValeur2" class="col-md-2 control-label" for="valeur">€</label>
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


  //VERIFICATION NOM DU THEME

  function checkTheme() {
        
    var theme = document.getElementById('theme').value;

    var regTheme = new RegExp('^[a-zA-Z]{2,17}[0-9]{0,3}$','i');
            
    if(regTheme.test(theme)) {

      document.getElementById("labelTheme").style.color = "black"
            
      return true;

    } else {

      document.getElementById("labelTheme").style.color = "red"
            
      return false;
    
    }

  }


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



  //VERIFICATION VALIDITE SUPERFICIE

  function checkSuperficie() {

    var longueur = document.getElementById('longeur').value;

    var regSuperficie = new RegExp('^[0-9]{1,7}((.|,)[0-9]{2})?$','i')

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

  //VERIFICATION CORRESPONDANCE MOT DE PASSE

  function check2Pass() {

    var x = document.getElementById("pass1").value;
    var y = document.getElementById("pass2").value;

    if (x == y)
    {

      $('[data-toggle="pass2"]').popover('hide')

      document.getElementById("labelPass2").style.color = "black"
    
      return true;
    }
    else
    {

      $('[data-toggle="pass2"]').popover('show')

      document.getElementById("labelPass2").style.color = "red"
    
      return false;

    }
  }

  //VERIFICATION VALIDITE NOM

  function checkNom()
  {
    var nom = document.getElementById("nom").value;
    var regNom = new RegExp('[a-zA-Z]{1,20}$','i'); 

    if(regNom.test(nom))
    {

      document.getElementById("labelNom").style.color = "black"

      return true;
   
    }

    else
     {

      document.getElementById("labelNom").style.color = "red"

      return false;

    }
  }

  //VERIFICATION VALIDITE PRENOM

  function checkPrenom()
  {
    var prenom = document.getElementById("prenom").value;
    var regPrenom = new RegExp('[a-zA-Z]{1,20}$','i'); 

    if(regPrenom.test(prenom))
    {

      document.getElementById("labelPrenom").style.color = "black"

      return true;
   
    }

    else
     {

      document.getElementById("labelPrenom").style.color = "red"

      return false;

    }
  }


  //VERIFICATION CGU COCHE

  function checkCgu() {

    var cgu = document.getElementById("cgu").checked;

    if (cgu == true)
    {

      $('[data-toggle="pass2"]').popover('hide')

      return true;
    }
    else

    {
      $('[data-toggle="cgu"]').popover('show')
      return false;
    }

  }


  //VERIFIE LA VALIDITE DES CHAMPS OBLIGATOIRE DU FORM


function checkForm() {

  if (checkTheme() == true && checkNbPiece() == true && checkSuperficie() == true)
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

