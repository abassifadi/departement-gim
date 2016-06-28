@extends('index_professeur')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Categorie</a></li>
  <li class="active">Ajouter</li>
</ol>

<div class="page-header">
  <h4>Ajouter Categorie</h4>
</div>
<br/>

<span class="col-md-12">
 <strong style="color:#00b503">{{$errors->first('saved_success')}}</strong>
</span>

{!! Form::open(array(
 'method'=>'post' ,
  'route' => 'categorie.store'  )) !!}

  <div class="form-group">
     {!! Form::label('nom','Inserer le nom de la categorie') !!}
      {!! Form::text('nom',null , ['class' => 'form-control' ,'required'=> 'required']) !!}
  </div>

  <div class="form-group">
     {!! Form::label('description','Inserer la description de la categorie') !!}
      {!! Form::textarea('description',null , ['class' => 'form-control','required'=> 'required']) !!}
  </div>



{!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
{!! Form::close() !!}


@stop
