@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Profile</a></li>
  <li class="active">Update</li>
</ol>
<div class="page-header">
  <h4>Modifier Profile</h4>
</div>
<br/>

 {!! Form::model($user,array(
  'method'=>'post' ,
   'route' => 'user.update'  )) !!}
  <div class="form-group">
   {!! Form::label('email' , 'Email') !!}
   {!! Form::email('email',null , ['class'=>'form-control','placeholder'=>'Taper votre adresse mail']) !!}
  </div>
  <div class="form-group">
   {!! Form::label('password' , 'Password') !!}
   {!! Form::password('password', ['class'=>'form-control','placeholder'=>'Taper votre adresse mail']) !!}
  </div>
  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}

@stop
