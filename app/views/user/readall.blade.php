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
        <li>{{HTML::link('user/show', 'Mon profil')}}</li>
         @if (Auth::check())
            @if((Auth::user()->statut=="admin"))
                <li class="active">{{HTML::link('user/index', 'Administration')}}</li>
            @endif
          @endif
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li>{{HTML::link('auth/logout', 'Deconnexion')}}</li>
      </ul>
    </div>
  </div>
</nav>
@section('script')
{{HTML::script('js/excellentexport.js') }}
{{HTML::script('js/jspdf.js') }}
{{HTML::script('js/base64.js') }}
{{HTML::script('js/sprintf.js') }}
{{HTML::script('js/tableExport.js') }}
{{HTML::script('js/jquery.base64.js') }}
@stop


@section('contenu')
@parent

<!-- BOUTON EXPORT -->
<div class="btn-group">
 <a href="#" class="btn btn-primary">Export</a>
  <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><span class="caret"></span></a>
  <ul class="dropdown-menu">
    <li><a download="utilisateurs.xls" href="#" onclick="return ExcellentExport.excel(this, 'datatable', '');">Excel</a></li>
   <!-- <li><a download="utilisateurs.csv" href="#" onclick="return ExcellentExport.csv(this, 'datatable');">CSV</a></li>-->
    <li><a href="#" onclick ="$('#datatable').tableExport({type:'pdf',escape:'false'});">PDF</a></li>

  </ul>
</div><br \><br \>


<!-- TABLEAU -->

<table id="datatable" class="table table-striped table-hover ">

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

      <td>{{$users->id}}</td>
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


