@extends('index_professeur')


@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Soutences</a></li>

</ol>
<div class="page-header">
  <h4>Mes Soutenances</h4>
</div>
<br/>

@if (!empty($success))
     <div class="alert alert-danger">
    {{ $success }}
     </div>
     <br/>
@endif

<table class="table  table-striped table-condensed" id="table">
   <thead>
  <th>Projet</th>
  <th>Date</th>
  <th>Salle</th>
  <th>Enseignant</th>
  <th>Evaluer</th>
  </thead>
  <tbody>
      @foreach($soutenances as $soutenance)
      <td> {{ $soutenance->encadrement->ppp->name }} </td>
      <td> {{ $soutenance->date  }} </td>
      <td> {{ $soutenance->salle  }} </td>
      <td> {{ $soutenance->encadrement->ppp->professeur->full_name  }} </td>
      <td> <a href="{{ route('examinateur.note.get',$soutenance->encadrement->ppp->id) }}" class="btn btn-danger">Evaluer</a>  </td>
      @endforeach
  </tbody>
</table>

@stop
