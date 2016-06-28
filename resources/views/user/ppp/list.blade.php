@extends('index_user')

@section('content')
<ol class="breadcrumb">
  <li><a href="..">Home</a></li>
  <li><a href=".">PPP</a></li>
  <li class="active">List</li>
</ol>
<div class="page-header">
  <h4>Liste des PPP</h4>
</div>
<br/>
<table class="table  table-striped table-condensed" id="table">
  <thead>
    <th>Identifiant</th>
  <th >Nom</th>
  <th>Professeur</th>
  <th>Détails</th>

  </thead>
  <tbody>
 @foreach( $ppp_list as $ppp)
  <tr>
   <td > {{ $ppp->id}} </td>
   <td > {{ $ppp->name}} </td>
   <td > {{ $ppp->professeur->prenom}} {{ $ppp->professeur->nom}} </td>
   <td>  <a href="{{ route('ppp.details',$ppp->id) }}" class="btn btn-primary " >Details</a> </td>
  </tr>
 @endforeach
</tbody>
<tfoot>
<th>Identifiant</th>
<th >Nom</th>
<th>Professeur</th>
<th>  </th>
</tfoot>
<table>
  <script src="https://code.jquery.com/jquery-1.11.3.min.js">  </script>
     <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js">  </script>
     <script>

     $(document).ready(function() {
       $('#table').DataTable( {
          initComplete: function () {



               this.api().columns().every(function () {
                   var column = this;

                   if(column.index() <3 ) {
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
