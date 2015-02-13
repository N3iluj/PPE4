
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Manifestation Lego®</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Poncet Medhy, Charles Geoffrey, Einhart Guillaume et Julien Card">

    <!-- IMPORT DES STYLES CSS -->

	  {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-responsive.min.css')}}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">


  </head>

  <body style="padding-top: 60px;">

      <div class="container">
    <!--    <h1>Bootstrap starter template</h1>
    <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p>-->

      <!-- RETOUR MESSAGE D'ERREUR -->

       @if ($errors->count() > 0)

          @foreach ($errors -> all() as $message)

          <div class="alert alert-danger">

            {{ $message }} <br />

          </div>

          @endforeach     
      
        @endif


        <!-- RETOUR MESSAGE SESSION FLASH FAIL -->

        @if (Session::has('fail'))

          <div class="alert alert-danger">

            {{Session::get('fail')}}

          </div>

        @endif


        <!-- RETOUR MESSAGE SESSION FLASH SUCCESS -->


        @if (Session::has('success'))

          <div class="alert alert-success">

            {{Session::get('success')}}

          </div>    

        @endif


        <!-- RETOUR MESSAGE SESSION FLASH INFO -->

        @if (Session::has('info'))

          <div class="alert alert-info">

            {{Session::get('info')}}

          </div>

        @endif




        @section('contenu')

        <!-- AFFICHAGE DE LA VIEW SI section('contenu') DEDANS -->

        @show

        <!-- FIN DE LA VIEW -->


        </div> <!-- /container -->    




    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

      {{HTML::script('js/jquery-2.1.1.min.js') }}
      {{HTML::script('js/bootstrap.min.js')}}

      @section('script')
      @show
      

  </body>

</html>



