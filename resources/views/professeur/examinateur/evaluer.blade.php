@extends('index_professeur')


@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">PPP</a></li>
  <li class="active">Evaluer</li>
</ol>

<div class="page-header">
  <h4>Evaluer PPP</h4>
</div>
<br/>

{!! Form::open(array(
 'method'=>'post' ,
  'route' => 'examinateur.note.save'  )) !!}

{{ Form::hidden('id',$encadrement->id)}}

@for ($i = 0; $i < count($criteres); $i++)
  {{ Form::label('tt',$criteres[$i]->nom)}}
<div class="well">
  <div id="test" class="slider slider-horizontal" data-slider-min="0" data-slider-id="1" data-slider-max="{{ $criteres[$i]->note_max}}" data-slider-handle="triangle" data-slider-value="1"  style="width: 100%;">
  <div class="tooltip top" style="top: -40px; left: 37px;"></div>
  <input type="text" name="criteres[]" class="span2" value="1"  id="critere{{$i}}"></div>
  </div>

  @endfor


  {{ Form::hidden('id',$encadrement->id)}}
  {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
 {!! Form::close() !!}
 <script src="{!! asset('js/bootstrap.js') !!}"></script>
 <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"> </script>
 <script src="{!! asset('js/bootstrap-slider.js') !!}"></script>
 <script>

  $(document).ready(function(){
    $(".slider").each(function($index){
      $(this).slider({
        formatter: function(value) {
          return '' + value;
        }
      }).on('slideStop', function(ev){
          var newVal = $(this).val();
          $('#critere'+$index).val(newVal) ;
  });
    })
  });
  </script>



@stop
