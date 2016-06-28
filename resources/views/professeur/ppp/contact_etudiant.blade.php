@extends('index_professeur')


@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Etudiant</a></li>
  <li class="active">Contact</li>
</ol>
<div class="page-header">
  <h4>Page de contact</h4>
</div>
<br/>

<div class="alert alert-danger">
   <p>Vous allez envoyer un email à : </p>
    <ul>
   @foreach($etudiants as $etudiant)
       <li> <span> {{ $etudiant->full_name}} : </span> {{ $etudiant->email }}   </li>
   @endforeach
 </ul>
</div>

{!! Form::open(array(
 'method'=>'post' ,
  'route' => 'ppp.user.mail.send'  )) !!}

<div class="form-group">
     {!! Form::label('sujet','Sujet') !!}
     {!! Form::text('sujet',null , ['class' => 'form-control']) !!}
</div>
<div class="form-group">
     {!! Form::label('message','Message') !!}
     {!! Form::textarea('message',null , ['class' => 'form-control','rows' => 3]) !!}
</div>

 @foreach($etudiants as $etudiant)
  {!! Form::hidden('etudiants[]' ,$etudiant->id) !!}

 @endforeach

  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}


@stop
