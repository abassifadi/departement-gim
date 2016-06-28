@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Professeur</a></li>
  <li class="active">List</li>
</ol>
<div class="page-header">
  <h4>Lister les Professeur</h4>
</div>
<br/>

<table class="table  table-striped table-condensed" id="table">
<thead>
<th>immatricule</th>
<th>nom</th>
<th>prenom</th>
<th>login</th>
<th>Update</th>
<th>Delete</th>
</thead>
<tbody>
@foreach($professeurs as $professeur)
<tr>
<td>{{ $professeur->immatricule }}</td>
<td>{{ $professeur->nom }}</td>
<td>{{ $professeur->prenom }}</td>
<td> {{ $professeur->login }}  </td>
<td>
 <a href="{{ route('AdminPPP.professeur.update.get',$professeur->id) }}" class="btn " > Update</a>
</td>
<td>
    {!! Form::open(array('route' => array('AdminPPP.professeur.delete'), 'method' => 'post' , 'class'=> 'form-delete')) !!}
    {!! Form::hidden('id',$professeur->id) !!}
    {!! Form::submit('Delete' , ['class'=>'btn btn-danger' , 'onclick'=>'return confirm(\'Are you sure you want to delete this item?\');']) !!}
     {!! Form::close() !!}
   </td>
</tr>
@endforeach
</tbody>

</table>

@stop
