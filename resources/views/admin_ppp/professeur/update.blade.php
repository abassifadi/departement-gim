@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Professeur</a></li>
  <li class="active">Update</li>
</ol>
<div class="page-header">
  <h4>Modifier {{ $professeur->nom }}</h4>
</div>
<br/>
{!! Form::model($professeur,array(
 'method'=>'post' ,
 'route' => 'AdminPPP.professeur.update.post'  )) !!}

  {!! Form::hidden('id',$professeur->id) !!}
 <div class="form-group">
  {!! Form::label('nom' , 'Nom') !!}
  {!! Form::text('nom',null , ['class'=>'form-control','placeholder'=>'Taper le nom']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('prenom' , 'Prenom') !!}
  {!! Form::text('prenom',null , ['class'=>'form-control','placeholder'=>'Taper le prenom']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('immatricule' , 'Immatricule') !!}
  {!! Form::number('immatricule',null , ['class'=>'form-control','placeholder'=>'']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('email' , 'Email') !!}
  {!! Form::email('email',null , ['class'=>'form-control','placeholder'=>'mail@mail.com']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('telephone' , 'Telephone') !!}
  {!! Form::number('telephone',null , ['class'=>'form-control','placeholder'=>'+000']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('login' , 'Login') !!}
  {!! Form::text('login',null , ['class'=>'form-control','placeholder'=>'Taper le login']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('password' , 'Password') !!}
  {!! Form::password('password', ['class'=>'form-control','placeholder'=>'']) !!}
 </div>

 {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
{!! Form::close() !!}
@stop
