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
        <li class="active">{{HTML::link('user/show', 'Mon profil')}}</li>
         @if (Auth::check())
            @if((Auth::user()->statut=="admin"))
                <li>{{HTML::link('user/index', 'Administration')}}</li>
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
<!-- BOUTON EXPORT -->
<div class="btn-group open">
  <a href="#" class="btn btn-primary">Export</a>
  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a href="#">Action</a></li>
    <li><a href="#">Another action</a></li>
    <li><a href="#">Something else here</a></li>
    <li class="divider"></li>
    <li><a href="#">Separated link</a></li>
  </ul>
</div>


<!-- TABLEAU -->

<?php $nb = 1 ?>

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>#</th>
      <th>Pseudo</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>N° Tel</th>
      <th>Email</th>
    </tr>
  </thead>
  <tbody>
@foreach($lesuser as $users)
      <tr class="info">
      <td>{{$nb}}</td>
      <td>{{$users->username}}</td>
      <td>{{$users->nom}}</td>
      <td>{{$users->prenom}}</td>
      <td>{{$users->tel}}</td>
      <td>{{$users->email}}</td>
    </tr>
<?php $nb = $nb+1 ?>
@endforeach



  <!--
    <tr>
      <td>1</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr>
      <td>2</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="info">
      <td>3</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="success">
      <td>4</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="danger">
      <td>5</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="warning">
      <td>6</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>
    <tr class="active">
      <td>7</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
      <td>Column content</td>
    </tr>-->
  </tbody>
</table> 

@stop
