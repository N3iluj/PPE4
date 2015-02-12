
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manifestation Lego®</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	  {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/bootstrap-responsive.min.css')}}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

  </head>
  <body style="padding-top: 60px;">
      <div class="container">
    <!--    <h1>Bootstrap starter template</h1>
    <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p>-->

       @if ($errors->count() > 0)

          @foreach ($errors -> all() as $message)

          <div class="alert alert-error">

            {{ $message }} <br />

          </div>

          @endforeach     
      
        @endif



        @if (Session::has('fail'))

          <div class="alert alert-danger">

            {{Session::get('fail')}}

          </div>

        @endif


        @if (Session::has('success'))

          <div class="alert alert-success">

            {{Session::get('success')}}

          </div>    

        @endif



        @if (Session::has('info'))

          <div class="alert alert-info">

            {{Session::get('info')}}

          </div>

        @endif


        @section('contenu')
        @show

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



