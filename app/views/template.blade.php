
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Manifestation Lego®</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

	  {{HTML::style('css/bootstrap.css')}}

    {{HTML::script('js/bootstrap.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->

  </head>
  <body>
    <div class="divPadding" style="padding-top: 60px">
      <div class="container">
    <!--    <h1>Bootstrap starter template</h1>
    <p>Use this document as a way to quick start any new project.<br> All you get is this message and a barebones HTML document.</p>-->
      @section('contenu')
      @show

      </div> <!-- /container -->
    </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    {{HTML::script('js/jquery-2.1.1.min.js') }}

    @section('script')
    @show

  </body>
</html>



