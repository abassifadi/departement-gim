@extends('index_professeur')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">professeur</a></li>
  <li><a href=".">module</a></li>
  <li class="active">update</li>
</ol>
<div class="page-header">
  <h4>Update Module</h4>
</div>
<br/>
{!! Form::model($module,array(
 'method'=>'put' ,
  'route' => array('module.update',$module->id)  )) !!}
  {!! Form::hidden('id', $module->id) !!}
  <div class="form-group">
       {!! Form::label('nom','Nom Du module') !!}
       {!! Form::text('nom',null , ['class' => 'form-control']) !!}
  </div>

  <div class="form-group">
   {!! Form::label('filiere_id' , 'Choisir la filière') !!} <br/>
   {!! Form::select('filiere_id',  $filieres, null ,['class'=>'form-control', 'required'=>'required'] ) !!}
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
