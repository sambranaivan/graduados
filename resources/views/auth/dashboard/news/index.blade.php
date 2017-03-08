@extends('layouts.dashboard')
@section('content')
<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar noticias</button><br><br>
@include('auth.dashboard.news.modal_modif')
@include('auth.dashboard.news.modal_alta')

  <table class="table table-bordered" id="new">
	<thead>
		<tr>
			<th>Tipos de Noticias</th>
			<th>Titulo</th>
			<th>Subtitulo</th>
			<th> Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i></th>
      <th>Ver <i class="fa fa-eye" aria-hidden="true"></i></th>
		</tr>
	</thead>
	
</table>
@endsection
@section('script')
 <script>
    /* Selects de tipo de noticias*/
    $("#type").click(function(){
      $.get("{{url('panel/tipo_noticia')}}", function(response){
           $("#type").empty();
           for (var i = 0; i < response.length; i++) {
             $("#type").append("<option value='"+response[i].typenew_id+"'>"+response[i].description+"</option>");             
           }
      });
    });
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="4" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Fecha de creación:</td>'+
                '<td>'+d.created_at+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fecha ultima modificación:</td>'+
                '<td>'+d.updated_at+'</td>'+
            '</tr>'+
        '</table>';
    }
    $(document).ready(function() {
    	load_news();

    })
    var load_news = function (){
    	var table = $('#new').DataTable({
        	"destroy":true,
        	"order":[[0,"asc"]],
          "lengthChange": false,
          "language":{
        		"url": "{{asset('plugins/datatables/Spanish.json')}}"
        	},               
        	"ajax":{
        		"method":"GET",
        		"url":"{{url('panel/news')}}",
            "dataType":"JSON"
        	},
        	"columns":[
               {"data":'type.description'},
               {"data":'title'},
               {"data":'pompadour'},
               {"data":null,
                "defaultContent":"<button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               },
               {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,
                "defaultContent": ''
               }

        	]
        });
        // Add event listener for opening and closing details
        $('#type tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row( tr );
     
            if ( row.child.isShown() ) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
            }
            else {
                // Open this row
                row.child( format(row.data()) ).show();
                tr.addClass('shown');
            }
        });
        
    }
    
    $("#agregar_type").on("click", function(){
       $.ajax({
            url: "{{url('panel/noticias')}}",
            headers:{'X-CSRF-TOKEN':token},
            type: "POST",
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($("#form_new")[0]),
            success: function(){
              load_news();
              $('#form_new')[0].reset();
            }
       });
      
    });
    
 </script>
@endsection


