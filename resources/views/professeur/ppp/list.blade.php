@extends('index_professeur')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">PPP</a></li>
  <li class="active">Mes Propositions</li>
</ol>
<div class="page-header">
  <h4>Mes Propositions</h4>
</div>
<br/>
@if (!empty($success))
     <div class="alert alert-danger">
    {{ $success }}
     </div>
     <br/>
@endif
<span class="col-md-12">
 <strong style="color:#e20404">{{$errors->first('ppp_not_affected')}}</strong>
</span>
<table class="table  table-striped table-condensed" id="table">
  <th>Identifiant</th>
  <th>Nom</th>
  <th>Note Soutenance</th>
  <th>Note Finale</th>
  <th>Modifier</th>
  <th>Contacter</th>
  <th>Evaluer</th>
  <th>Soutenace</th>
  @foreach($ppps as $ppp)
  <tr>
  <td> {!! $ppp->id !!}</td>
  <td> {!! $ppp->name !!}</td>
  <td>
    @if(!is_null($ppp->encadrement))
      {{$ppp->encadrement->note_soutenance}}
    @endif
  </td>
  <td>
    @if(!is_null($ppp->encadrement))
      {{ $ppp->encadrement->note_finale }}
    @endif
  </td>
  <td>
   <a href="{{ route('professeur.ppp.modifier',$ppp->id) }}" class="btn btn-primary" >Modifier</a>
  </td>
  <td> <a href="{{ route('ppp.user.mail',$ppp->id) }}" class="btn">Contact</a>  </td>
  <td> <a href="{{ route('get.evaluer.ppp',$ppp->id) }}" class="btn btn-danger">Evaluer</a>  </td>
  <td> <a href="{{ route('ppp.encadrement.soutenance',$ppp->id) }}" class="btn btn-danger">Soutenance</a>  </td>
  </tr>
  @endforeach
<table>
@stop
