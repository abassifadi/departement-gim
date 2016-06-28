@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Critere</a></li>
  <li class="active">List</li>
</ol>
<div class="page-header">
  <h4>Modifier Critere Jury</h4>
</div>
<br/>
{!! Form::model($critere,array(
 'method'=>'post' ,
 'route' => 'AdminPPP.update.examinateur.critere.save'
 )) !!}

  {!! Form::hidden('id',$critere->id) !!}

  <div class="form-group">
   {!! Form::label('nom' , 'Critere') !!}
   {!! Form::text('nom',null , ['class'=>'form-control','placeholder'=>'Taper le critere d evaluation']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('note_min' , 'Note Minimale') !!}
   {!! Form::number('note_min',null , ['class'=>'form-control','placeholder'=>'Taper la note minimal']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('note_max' , 'Note Maximale') !!}
   {!! Form::number('note_max',null , ['class'=>'form-control','placeholder'=>'Taper la note maximale']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('coefficient' , 'Coefficient') !!}
   {!! Form::number('coefficient',null , ['class'=>'form-control','placeholder'=>'Taper la note maximale']) !!}
  </div>

  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}

@stop
