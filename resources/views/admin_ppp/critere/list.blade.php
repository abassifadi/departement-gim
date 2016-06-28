@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Critere</a></li>
  <li class="active">Add</li>
</ol>
<div class="page-header">
  <h4>Liste des Critere</h4>
</div>
<br/>
<table class="table  table-striped table-condensed" id="table">
  <th>Nom</th>
  <th>Note Min</th>
  <th>Note Max</th>
  <th>Coefficient</th>
  <th>Delete</th>
<!--  <th>Delete</th> -->
  <tbody>
   @foreach($criteres as $critere)
      <tr>
      <td> {{ $critere->nom }} </td>
      <td> {{ $critere->note_min }}  </td>
      <td> {{ $critere->note_max }}  </td>
      <td>  {{  $critere->coefficient}}   </td>
      <td>

   {!! Form::open(array('route' => array('adminPPP.post.delete'), 'method' => 'post' , 'class'=> 'form-delete')) !!}
    {!! Form::hidden('id',$critere->id) !!}
   {!! Form::submit('Delete' , ['class'=>'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure you want to delete this item?\');']) !!}
    {!! Form::close() !!}
  </td>

      <td>
  <!-- <a href="{{ route('AdminPPP.update.critere',$critere->id) }}" class="btn " > Update</a> -->
 </td>

      </tr>

   @endforeach
  </tbody>
</table>
@stop
