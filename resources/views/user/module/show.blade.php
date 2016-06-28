@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">home</a></li>
  <li><a href="#">user_module</a></li>
  <li class="active">show</li>
</ol>
<div class="page-header">
  <h4>Détails {{ $module->nom }}</h4>
</div>
<h6 class="pull-right"><b>proposé par : {!! $module->professeur->full_name !!}</b></h6>
 <br/><br/>

 <div class="entry">
    <div class="panel panel-primary">
      <div class="panel-body">
   {!! $module->description !!}
 </div>
 <div class="clearfix"></div>
 </div>
 </div>
  <br/>
 <div class="entry">
    <div class="panel panel-primary">
      <div class="panel-body">
   {!! $module->planning !!}
 </div>
 <div class="clearfix"></div>
 </div>
 </div>



@stop
