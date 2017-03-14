@extends('layouts.dashboard')
@section('content')
<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar noticias</button><br><br>

@include('auth.dashboard.news.modal_alta')
@include('auth.dashboard.news.modal_modif')
<table class="table table-bordered" id="new">
		
</table>
@endsection
@section('script')
 <script>
    /* Selects de tipo de noticias*/
    $('#type').select2({       
       dropdownParent: $("#myModal")
    });
    $('#type_m').select2({       
       dropdownParent: $("#myModal_modif")
    });
    /* Formatting function for row details - modify as you need */
    function format ( d ) {
        // `d` is the original data object for the row
        return '<table cellpadding="4" cellspacing="0" border="0" style="padding-left:50px;">'+
            '<tr>'+
                '<td>Contenido:</td>'+
                '<td>'+d.body+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fecha de publicación:</td>'+
                '<td>'+d.publication_date+'</td>'+
            '</tr>'+
            '<tr>'+
                '<td>Fecha fin publicación:</td>'+
                '<td>'+d.end_publication+'</td>'+
            '</tr>'+
        '</table>';
    }
    $(function() {
    	load_news();
      
    })
    var load_news = function (){
      $('#new').empty();
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
               {"data":'new_id',"title":"#"}, 
               {"data":'type.description',"title":"Tipo de Noticia"},
               {"data":'title',"title":"Titulo"},
               {"data":'pompadour',"title":"Subtitulo"},
               {"data":null,"title":"Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i>",
                "defaultContent":"<button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               },
               {
                "className":      'details-control',
                "orderable":      false,
                "data":           null,"title":"Ver <i class='fa fa-eye' aria-hidden='true'></i>",
                "defaultContent": ''
               }

        	]
        });
        // Add event listener for opening and closing details
        $('#new tbody').on('click', 'td.details-control', function () {
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
    
    $("#agregar_new").on("click", function(){
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
    $("body").on("click","button.editar",function(){
        var id = $(this).parent("td").prev("td").prev("td").prev("td").prev("td").text();
        console.log(id);
        var route = "{{url('panel/noticias')}}"+'/'+id+'/edit';
        $.get(route, function(res){
            $("#id").val(res.new_id);
            $("#title_m").val(res.title);
            $("#pompadour_m").val(res.pompadour);
            $("#body_m").val(res.body);
            $("#publication_date_m").val(res.publication_date);
            $("#end_publication_m").val(res.end_publication);            
        });
    });
 </script>
@endsection


