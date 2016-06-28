@extends('index_professeur')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Soutence</a></li>

</ol>
<div class="page-header">
  <h4>Choisir les details de soutenance</h4>
</div>
<br/>

{!! Form::model($soutenance,array(
  'method'=>'post'  ,
   'route' => 'ppp.encadrement.soutenance.save'))  !!}

 {!! Form::hidden('id',$soutenance->id) !!}
   <div class="form-group">
    {!! Form::label('professeur_id' , 'Professeur') !!}
    {!! Form::select('professeur_id',$professeurs,null , ['class'=>'form-control','placeholder'=>'--']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('date' , 'Choisir la date et le temps') !!}
    {!! Form::dateTime('date',null , ['class'=>'form-control']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('salle' , 'Choisir la Salle') !!}
    {!! Form::text('salle',null , ['class'=>'form-control','placeholder'=>'Choisir Une Salle']) !!}
   </div>



   {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
  {!! Form::close() !!}

@stop
