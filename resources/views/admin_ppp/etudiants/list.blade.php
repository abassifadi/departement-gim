@extends('index_admin_ppp')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">Etudiant</a></li>
  <li class="active">List</li>
</ol>
<div class="page-header">
  <h4>Lister les Etudiant</h4>
</div>
<br/>
<table class="table  table-striped table-condensed" id="table">
   <thead>
  <th>CIN</th>
  <th>Nom</th>
  <th>Prenom</th>
  <th>Filiere</th>
  <th>Supprimer  </th>
  <th>Modifier</th>
</thead>
  <tbody>
    @foreach($etudiants as $etudiant)
    <tr>
    <td> {{ $etudiant->cin }}</td>
    <td> {{ $etudiant->nom }} </td>
    <td> {{ $etudiant->prenom }}  </td>
    <td> {{ $etudiant->filiere->nom }}</td>
    <td>
   <a href="{{ route('AdminPPP.etudiant.update.get',$etudiant->id) }}" class="btn " > Update</a>
    </td>
  <td>
      {!! Form::open(array('route' => array('AdminPPP.etudiant.delete'), 'method' => 'post' , 'class'=> 'form-delete')) !!}
      {!! Form::hidden('id',$etudiant->id) !!}
      {!! Form::submit('Delete' , ['class'=>'btn btn-danger' , 'onclick'=>'return confirm(\'Are you sure you want to delete this item?\');']) !!}
       {!! Form::close() !!}
     </td>
    </tr>
   @endforeach
  </tbody>
   <tfoot>
     <th>CIN</th>
     <th>Nom</th>
     <th>Prenom</th>
     <th>Filiere</th>
     <th/> <th/>
   </tfoot>
<table>
  <table>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js">  </script>
       <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js">  </script>
       <script>

       $(document).ready(function() {
         $('#table').DataTable( {
            initComplete: function () {



                 this.api().columns().every(function () {
                     var column = this;

                     if(column.index() <4 ) {
                     var select = $('<select><option value="">--</option></select>')
                         .appendTo( $(column.footer()).empty() )
                         .on( 'change', function () {
                             var val = $.fn.dataTable.util.escapeRegex(
                                 $(this).val()
                             );
                             column
                                 .search( val ? '^'+val+'$' : '', true, false )
                                 .draw();
                         } );



                     column.data().unique().sort().each( function ( d, j ) {
                         select.append( '<option value="'+d+'">'+d+'</option>' )
                     } );
                       }
                 } );
             }

         } );
       } );
       </script>


@stop
