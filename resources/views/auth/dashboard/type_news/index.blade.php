@extends('layouts.dashboard')
@section('content')
<button type="button" class="btn btn-success pull-left"  data-toggle="modal" data-target="#myModal">Agregar tipo de noticias</button><br><br>

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
                "defaultContent":"<button type='button' class='ver btn btn-info' data-toggle='modal' data-target='#myModal_modif' onclick='type_ver()'><i class='fa fa-eye' aria-hidden='true'></i> Ver</button><button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif' onclick='type_ocultar()'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               }

        	]
        });
        
    }
    $("body").on("click","button.editar",function(){
        var id = $(this).parent("td").prev("td").prev("td").text();
        var route = "{{url('panel/tipo_noticias')}}"+'/'+id+'/edit';
        $.get(route, function(res){
		    $("#id").val(res.typenew_id);
		    $("#description").val(res.description);	
		});
    });
    $("body").on("click","button.ver",function(){
        var id = $(this).parent("td").prev("td").prev("td").text();
        var route = "{{url('panel/type_ne')}}"+'/'+id;
        $.get(route, function(res){
            var fecha_c= new Date(res[0].created_at);
            var fechac = fecha_c.getDate() + '/' + (fecha_c.getMonth() + 1) + '/' + fecha_c.getFullYear()+'  '+fecha_c.getHours()+':'+fecha_c.getMinutes()+':'+fecha_c.getSeconds()+ ' hs';
            var fecha_u= new Date(res[0].updated_at);
            var fechau = fecha_u.getDate() + '/' + (fecha_u.getMonth() + 1) + '/' + fecha_u.getFullYear()+'  '+fecha_u.getHours()+':'+fecha_u.getMinutes()+':'+fecha_u.getSeconds()+ ' hs';

            $("#id").val(res[0].typenew_id);
            $("#description").val(res[0].description); 
            $("#created_at").val(fechac);
            $("#updated_at").val(fechau);
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
    function type_ocultar(){
        $("#created_at1").hide();
        $("#updated_at1").hide();
        $("#created_at").attr("type","hidden");
        $("#updated_at").attr("type","hidden");
        $("#description").removeAttr("readonly");
        $("#modif_type").show();

    }
    function type_ver(){
        $("#created_at1").show();
        $("#updated_at1").show();
        $("#description").attr("readonly","readonly");
        $("#created_at").attr("type","text");
        $("#updated_at").attr("type","text");
        $("#titulo").html("Datos del registro");        
        $("#modif_type").hide();
    }
    
 </script>
@endsection