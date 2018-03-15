@extends('layouts.master')
@section('content')
<div class="container">
    <div class="blanc">
        <h1>Liste de mes Mangas</h1>
    </div>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scénariste</th>
                <th>Prix</th>
                <th>Modification </th>
                <th>Suppression </th>
            </tr>
        </thead>
        <!--/* A compléter */-->
        @foreach($mangas as $manga)
        <tr>   
            <td> {{$manga->id_manga}} </td>
            <td> {{$manga->titre}}</td>
            <td> {{$manga->lib_genre}} </td>
            <td> {{$manga->nom_dessinateur}} </td>
            <td> {{$manga->nom_scenariste}} </td>
            <td> {{$manga->prix}} </td>
            <td style="text-align:center;"><a href="{{url('/modifierManga')}}/{{$manga->id_manga}}/">
                    <span class="glyphicon glyphicon-pencil" data-toggle="tooltip" data-placement="top" title="Modifier"></span></a></td>
            <td style="text-align:center;">
                <a class="glyphicon glyphicon-remove" data-toggle="tooltip" data-placement="top" title="Supprimer" href="#"
                    onclick="javascript:if(confirm('Suppression confirmée ?'))
            { window.location='{{url('/supprimerManga')}}/{{$manga->id_manga}}';}">
                </a>
            </td>                    
        </tr>
        @endforeach
        <BR> <BR>
    </table>
	<div class="col-md-6 col-md-offset-3">
        @include('error')
    </div>
</div>
@stop