@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Binomage</a></li>
  <li class="active">Liste</li>
</ol>

<div class="page-header">
  <h4>Liste des Binomes / Trinome</h4>
</div>

<table class="table  table-striped table-condensed" id="table">
<thead>
     <th>Membre 1</th>
     <th>Membre 2</th>
     <th>Membre 3</th>
</thead>
<tbody>
  @foreach($binomes as $binome)
   <tr>
    @foreach($binome->etudiants as $etudiant)
    <td>{{$etudiant->full_name}}</td>
    @endforeach
   </tr>
  @endforeach
</tbody>

</table>


@stop
