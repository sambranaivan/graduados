@extends('layouts.dashboard')
@section('style')
<style type="text/css">
    
</style>
@endsection
@section('content')

<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar tipo de noticias</button><br><br>

@include('auth.dashboard.type_news.modal_alta')
@include('auth.dashboard.type_news.modal_modif')

<table class="table table-bordered" id="type">
	<thead>
		<tr>
			<th>#</th>
			<th>Tipos de Noticias</th>
			<th> Editar <i class='fa fa-pencil-square-o' aria-hidden='true'></i></th>
            <th> Ver <i class="fa fa-eye" aria-hidden="true"></i></th>
		</tr>
	</thead>
	
</table>

@endsection
@section('script')
 <script>
    /* Formatting function for row details - modify as you need */
    function format(d) {
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
    
    $(function() {
        load_type_news();
    })

    var load_type_news = function (){
        var table = $('#type').DataTable({
        	"destroy":true,
        	"order":[[0,"asc"]],
        	"language":{
        		"url": "{{asset('plugins/datatables/Spanish.json')}}"
        	},               
        	"ajax":{
        		"method":"GET",
        		"url":"{{url('panel/type_news')}}",
                "contentType": "charset=UTF-8",
        		"dataType":"JSON"
        	},
        	"columns":[
               {"data":'typenew_id'},
               {"data":'description'},
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
                row.child(format(row.data())).show();
                tr.addClass('shown');
            }
        });
        
    }
    
    $("body").on("click","button.editar",function(){
        var id = $(this).parent("td").prev("td").prev("td").text();
        var route = "{{url('panel/tipo_noticias')}}"+'/'+id+'/edit';
        $.get(route, function(res){
		    $("#id").val(res.typenew_id);
            $("#description_m").val(res.description);
            
		});
    });

    $('#agregar_type').on("click", function(){
        var description = $("#description").val();
        var token = $('#token').val();
        var datas = "description="+description;
        $.ajax({
            url: "{{url('panel/tipo_noticias')}}",
            headers:{'X-CSRF-TOKEN':token},
            type: "POST",
            dataType: 'json',
            data:datas,
            success: function(){
                load_type_news();
                $('#form_type')[0].reset();
            }
        });
        
    });

    $('#modif_type').on("click", function(e){       
       var value = $("#id").val();
       var description = $("#description_m").val();
	   var route = "{{url('panel/tipo_noticias')}}"+'/'+value;
	   var token = $("#token").val();
	   var datas="description="+description;
	   $.ajax({
         url: route,
         headers:{'X-CSRF-TOKEN':token},
         type: 'PUT',
         dataType:'json',
         data:datas,
         success:function(){
         	load_type_news();
            $('#form_type_modif')[0].reset();

         }
	   });
       
	});
    
   
    
 </script>
@endsection