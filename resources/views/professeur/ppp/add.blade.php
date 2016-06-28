@extends('index_professeur')

 @section('content')
 <ol class="breadcrumb">
   <li><a href="..">Home</a></li>
   <li><a href=".">PPP</a></li>
   <li class="active">Add</li>
 </ol>
 <div class="page-header">
   <h4>Ajouter PPP</h4>
 </div>
 <br/>

 {!! Form::open(array(
  'method'=>'post' ,
   'route' => 'professeur.add.save'  )) !!}

   <div class="form-group">
    {!! Form::label('nom' , 'Sujet') !!}
    {!! Form::text('nom',null , ['class'=>'form-control','placeholder'=>'Taper le nom du sujet proposé']) !!}
   </div>

   <div class="form-group">
    {!! Form::label('filiere_id' , 'Choisir la filière') !!} <br/>
    {!! Form::select('filiere_id',  $ppps, null ,['class'=>'form-control', 'required'=>'required'] ) !!}
   </div>


   <div class="form-group">
   {!! Form::label('categories' , 'Selectionner les catégories') !!}
   <br/>
  @foreach ($categories as $categorie)
    <label for="categories"> {{$categorie->nom}} </label>
    <input tabindex="1" style="margin-right:2% ;"  type="checkbox" name="categories[]" id="{{$categorie->id}}" value="{{$categorie->id}}">
   @endforeach
    </div>


   <div class="form-group">
    {!! Form::label('description' , 'Sujet') !!}
    {!! Form::textarea('description',null , ['class'=>'form-control','rows' => 3,'placeholder'=>'Taper la description du sujet proposé']) !!}
   </div>
    <br/>

  {{ csrf_field() }}

   {!! Form::submit('Submit' , ['class'=>'btn btn-submit']) !!}
  {!! Form::close() !!}

@stop
