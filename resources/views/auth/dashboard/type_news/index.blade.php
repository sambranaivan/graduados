@extends('layouts.dashboard')
@section('content')
<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal" onclick="closemodif()">Agregar tipo de noticias</button><br><br>
@include('auth.dashboard.type_news.modal_modif')
@include('auth.dashboard.type_news.modal_alta')
<table class="table table-bordered" id="type">
	<thead>
		<tr>
			<th>#</th>
			<th>Tipos de Noticias</th>
			<th>Operaciones</th>
		</tr>
	</thead>
	
</table>
@endsection
@section('script')
 <script>
    
    $(document).ready(function() {
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
        		"dataType":"JSON"
        	},
        	"columns":[
               {"data":'typenew_id'},
               {"data":'description'},
               {"data":null,
                "defaultContent":"<button type='button' class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i> Ver</button><button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               }

        	]
        });
        
    }
    $("body").on("click","button.editar",function(){
        var id = $(this).parent("td").prev("td").prev("td").text();
        var route = "{{url('panel/type_new')}}"+'/'+id+'/edit';
        $.get(route, function(res){
		    $("#id").val(res.typenew_id);
		    $("#description").val(res.description);	

		});
    });
    
    $('#agregar_type').on("click", function(){
    	var description = $('#description').val();
    	var token = $('#token').val();
    	var datas = "description="+description;
    	$.ajax({
            url: "{{url('panel/type_new')}}",
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
       var description = $("#description").val();
	   var route = "{{url('panel/type_new')}}"+'/'+value;
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