@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Binome</a></li>
  <li class="active">Range</li>
</ol>
<div class="page-header">
  <h4>Liste Range Etudiants</h4>
</div>
<br/>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">  </script>
<ul class="nav nav-tabs">
@foreach($filieres as $filiere)
<li
@if($filiere->id==1)
class="active"
@endif
><a data-toggle="tab" href="#{{$filiere->id}}">{{ $filiere->nom }}</a></li>
@endforeach
</ul>

<div class="tab-content">
@foreach($filieres as $filiere)
<div id="{{$filiere->id}}" class="tab-pane fade in
@if($filiere->id==1)
  active
@endif">
   <br/>
   <a href="{{  route('AdminPPP.sujet.affectation',$filiere->id) }}" class="btn pull-right btn-primary" >Affecter Les Sujets</a>
    <br/>
    <br/>
   <table class="table table-bordered  table-striped table-condensed" id="table">
     <thead>
         <th>rang</th>
        <th>Etudiants</th>
        <th>Choix 1</th>
        <th>Choix 2</th>
        <th>Choix 3</th>
        <th>Choix 4</th>
    </thead>
    <tbody>
   @foreach($filiere->binomes->sortBy('rang') as $binome)
       @if($binome->etudiants->count()>0)

   <tr>

      <td>{{$binome->rang}}</td>
      <td>
         @foreach($binome->etudiants as $etudiant)
           <p>{{$etudiant->full_name }}</p>
         @endforeach
      </td>
        @foreach($binome->choix as $choix)
          @if(!is_null($choix->ppp))
          <td
          @if(!is_null($binome->encadrement))
           @if($choix->ppp->id == $binome->encadrement->ppp_id)
           class="affected"
           @endif
           @endif
          >{{ $choix->ppp->name }} </td>
          @endif
        @endforeach

    </tr>
    @endif
   @endforeach
  </tbody>
  </table>
</div>
@endforeach
</div>

@stop
