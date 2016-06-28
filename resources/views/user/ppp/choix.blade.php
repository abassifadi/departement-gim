@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href="#">PPP</a></li>
  <li class="active">Choix</li>
</ol>
<div class="page-header">
  <h4>Choix d'un sujet PPP</h4>
</div>
{{ Form::open(array(
 'method'=>'post' ,
  'route' => 'ppp.choix.save'  )) }}

  <div class="form-group">
   {!! Form::label('choix1' , 'Choix 1') !!}
     {!! Form::select('choix1',$ppp_list, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
  </div>
  <div class="form-group">
   {!! Form::label('choix2' , 'Choix 2') !!}
     {!! Form::select('choix2',$ppp_list, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
  </div>

  <div class="form-group">
   {!! Form::label('choix3' , 'Choix 3') !!}
     {!! Form::select('choix3',$ppp_list, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
  </div>

  <div class="form-group">
   {!! Form::label('choix4' , 'Choix 4') !!}
     {!! Form::select('choix4',$ppp_list, null ,['class'=>'form-control', 'required'=>'required' , 'placeholder' => '--'] ) !!}
  </div>


 {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
{{ Form::close() }}

@stop
