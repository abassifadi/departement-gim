@extends('index_user')


@section('content')
<ol class="breadcrumb">
  <li><a href="..">home</a></li>
  <li><a href="#">modules</a></li>
  <li class="active">liste</li>
</ol>
<div class="page-header">
  <h4>Liste des Modules</h4>
</div>

<table class="table  table-striped table-condensed" id="table">
 <thead>
    <th>Nom</th>
    <th>Responsable</th>
    <th>Coefficient</th>
    <th>Details</th>
</thead>
<tbody>
  @foreach($modules as $module)
   <tr>
     <td> {{ $module->nom }}  </td>
      <td> {{ $module->professeur->full_name }}  </td>
      <td> {{ $module->coeficient }}  </td>
      <td>
        <a href="{{ URL::to('user_module/' . $module->id) }}" class="btn btn-danger">Details</a>  
      </td>
   </tr>
  @endforeach

</tbody>
<tfoot>
  <th>Nom</th>
  <th>Responsable</th>
  <th>Coefficient</th>
  <th></th>
</tfoot>

</table>

@stop
