@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href="#">{!! $ppp->name !!}</a></li>
  <li class="active">Details</li>
</ol>
<div class="page-header">
  <h4>Details du sujet {!! $ppp->name !!}</h4>
</div>
<h6 class="pull-right"><b>proposé par : {!! $ppp->professeur->nom !!} {!! $ppp->professeur->prenom !!}</b></h6>
 <br/><br/>
<div class="entry">
   <div class="panel panel-primary">
     <div class="panel-body">
  {!! $ppp->description !!}
</div>
<div class="clearfix"></div>
</div>
</div>
<br/>
<div class="entry">
  <div class="panel panel-primary">
    <div class="panel-body">
      <div class="pull-right">
          @foreach( $ppp->categorisations as $categorisation)
          <span class="label label-default">{!! $categorisation->categorie->nom!!}</span>
          @endforeach
      </div>

 </div>
 </div>
</div>
@stop
