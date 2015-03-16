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
    <li><a href="#">VOUS</a></li>
    <li><a href="#">ETES</a></li>
    <li><a href="#">DES</a></li>
    <li class="divider"></li>
    <li><a href="#">GROSSES MERDES</a></li>
  </ul>
</div><br \><br \>


<!-- TABLEAU -->

<table class="table table-striped table-hover ">

  <thead>

    <tr>

      <th>#</th>
      <th>Pseudo</th>
      <th>Nom</th>
      <th>Prénom</th>
      <th>Téléphone</th>
      <th>Adresse e-mail</th>

    </tr>

  </thead>

  <tbody>

    @foreach($lesuser as $users)

    <tr>

      <td>{{$users -> id}}</td>
      <td>{{$users->username}}</td>
      <td>{{$users->nom}}</td>
      <td>{{$users->prenom}}</td>
      <td>{{$users->tel}}</td>
      <td>{{$users->email}}</td>

    </tr>

    @endforeach

  </tbody>

</table> 

@stop
