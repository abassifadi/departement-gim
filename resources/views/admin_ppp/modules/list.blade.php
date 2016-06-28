@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">modules</a></li>
  <li class="active">list</li>
</ol>
<div class="page-header">
  <h4>Lister Modules</h4>
</div>
<br/>
<table class="table  table-striped table-condensed" id="table">
  <thead>
     <th>Nom </th>
    <th>Filiere </th>
    <th>Coefficient</th>
    <th>Delelte</th>
    <th>Update</th>
  </thead>
   <tbody>
     @foreach($modules as $module)
       <tr>
         <td> {{ $module->nom }}</td>
         <td> {{ $module->filiere->nom }}</td>
         <td> {{ $module->coeficient }}   </td>
         <td>
   {!! Form::open(array('route' => array('admin_module.destroy', $module->id), 'method' => 'delete' , 'class'=> 'form-delete')) !!}
   {!! Form::submit('Delete' , ['class'=>'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure you want to delete this item?\');']) !!}
    {!! Form::close() !!}
     </td>
     <td>
      <a href="{{ route('admin_module.edit',$module->id	) }}" class="btn " > Update</a>
     </td>

       </tr>
     @endforeach
   </tbody>
   <tfoot>
     <th>Nom </th>
    <th>Filiere </th>
    <th>Coefficient</th>
    <th>  </th>
   </tfoot>
</table>
@stop
