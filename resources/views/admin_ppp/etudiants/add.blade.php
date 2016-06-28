@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Etudiant</a></li>
  <li class="active">Add</li>
</ol>
<div class="page-header">
  <h4>Ajouter Etudiant</h4>
</div>
<br/>
{!! Form::open(array(
 'method'=>'post' ,
 'route' => 'AdminPPP.etudiant.add.post'  )) !!}

 <div class="form-group">
  {!! Form::label('nom' , 'Nom') !!}
  {!! Form::text('nom',null , ['class'=>'form-control','placeholder'=>'Taper le nom de l etudiant']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('prenom' , 'Prenom') !!}
  {!! Form::text('prenom',null , ['class'=>'form-control','placeholder'=>'Taper le prenom de l etudiant']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('cin' , 'CIN') !!}
  {!! Form::number('cin',null , ['class'=>'form-control','placeholder'=>'Taper le CIN']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('num_inscri' , 'Numero D inscription') !!}
  {!! Form::number('num_inscri',null , ['class'=>'form-control','placeholder'=>'Taper le Numero d inscription']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('filiere_id' , 'Choisir la filière') !!} <br/>
  {!! Form::select('filiere_id',  $filieres, null ,['class'=>'form-control', 'required'=>'required'] ) !!}
 </div>

 <div class="form-group">
  {!! Form::label('moyenne' , 'Moyenne') !!}
  {!! Form::number('moyenne',null , ['step'=>'0.01' ,'class'=>'form-control','placeholder'=>'Taper la Moyenne']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('email' , 'Email') !!}
  {!! Form::email('email',null , ['class'=>'form-control','placeholder'=>'Taper l adresse mail']) !!}
 </div>
 <div class="form-group">
  {!! Form::label('login' , 'login') !!}
  {!! Form::text('login',null , ['class'=>'form-control','placeholder'=>'Taper le prenom de le login']) !!}
 </div>

 <div class="form-group">
  {!! Form::label('password' , 'Password') !!}
  {!! Form::password('password' , ['class'=>'form-control','placeholder'=>'Taper le password']) !!}
 </div>

 {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
{!! Form::close() !!}

@stop
