@extends('index_professeur')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Update</a></li>
  <li class="active">{!! $ppp->name !!}</li>
</ol>
<div class="page-header">
  <h4>Modifier {!! $ppp->name !!}</h4>
</div>
<br/>
{!! Form::model($ppp,array(
 'method'=>'post' ,
  'route' => 'professeur.ppp.update'  )) !!}

  {!! Form::hidden('id', $ppp->id )  !!} 

  <div class="form-group">
   {!! Form::label('name' , 'Sujet') !!}
   {!! Form::text('name',null , ['class'=>'form-control','placeholder'=>'Taper le nom du sujet proposé']) !!}
  </div>


  <div class="form-group">
   {!! Form::label('description' , 'Sujet') !!}
   {!! Form::textarea('description',null , ['class'=>'form-control','rows' => 3,'placeholder'=>'Taper la description du sujet proposé']) !!}
  </div>
   <br/>



 {{ csrf_field() }}

  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}

@stop
