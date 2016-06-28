@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Binomage</a></li>
  <li class="active">Choix</li>
</ol>

<div class="page-header">
  <h4>Choix Binome/Trinome</h4>
</div>

   @if($errors->any())
 <div class="alert alert-danger">
  <p>{{$errors->first()}}</p>
 </div>
   @endif

{{ Form::open(array(
 'method'=>'post' ,
  'route' => 'binom.choix.save'  )) }}

   <div class="form-group">
    {!! Form::label('member1' , 'Membre 1 du Binome/Trinome') !!}
      {!! Form::select('member1',  $users, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
   </div>

   <div class="form-group">
    {!! Form::label('member2' , 'Membre 2 du Binome/Trinome') !!}
      {!! Form::select('member2',  $users, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
   </div>
   <br/>
   <div class="alert alert-info">
    Au cas d'un trinome .
  </div>
</br>
<div class="form-group">
 {!! Form::label('member3' , 'Membre 3 du Binome/Trinome') !!}
   {!! Form::select('member3',  $users,  null ,['class'=>'form-control',  'placeholder'=>'--'] ) !!}
</div>
    {{ csrf_field() }}
   {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
  {!! Form::close() !!}

@stop
