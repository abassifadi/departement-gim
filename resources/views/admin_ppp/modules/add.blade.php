@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">modules</a></li>
  <li class="active">ajouter</li>
</ol>
<div class="page-header">
  <h4>Ajouter Module</h4>
</div>
<br/>

{!! Form::open(array(
 'method'=>'post' ,
  'route' => 'admin_module.store'  )) !!}

  <div class="form-group">
       {!! Form::label('nom','Nom Du module') !!}
       {!! Form::text('nom',null , ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('filiere_id' , 'Choisir la filière') !!} <br/>
   {!! Form::select('filiere_id',  $filieres, null ,['class'=>'form-control', 'required'=>'required'] ) !!}
  </div>

  <div class="form-group">
   {!! Form::label('professeur_id' , 'Choisir le responsable') !!} <br/>
   {!! Form::select('professeur_id',  $professeurs, null ,['class'=>'form-control', 'required'=>'required'] ) !!}
  </div>

  <div class="form-group">
       {!! Form::label('description','Description') !!}
       {!! Form::text('description',null , ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
       {!! Form::label('coeficient','Coefficient') !!}
       {!! Form::number('coeficient',null , ['class' => 'form-control' ,'step'=>'0.1']) !!}
  </div>

  <div class="form-group">
       {!! Form::label('plannig','Planning') !!}
       {!! Form::textarea('planning',null , ['class' => 'form-control' ,'rows'=> '3']) !!}
  </div>

  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}

@stop
