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
			<th>Operaciones</th>
		</tr>
	</thead>
	
</table>
@endsection
@section('script')
 <script>
    $(document).ready(function() {
    	load_news();

    })
    var load_news = function (){
    	var table = $('#new').DataTable({
        	"destroy":true,
        	"order":[[0,"asc"]],
        	"language":{
        		"url": "{{asset('plugins/datatables/Spanish.json')}}"
        	},               
        	"ajax":{
        		"method":"GET",
        		"url":"{{url('panel/news')}}",
        		"dataType":"JSON"
        	},
        	"columns":[
               {"data":'tipo_noticia'},
               {"data":'title'},
               {"data":'pompadour'},
               {"data":null,
                "defaultContent":"<button type='button' class='ver btn btn-info' data-toggle='modal' data-target='#myModal_view'><i class='fa fa-eye' aria-hidden='true'></i> Ver</button><button type='button' class='editar btn btn-danger' data-toggle='modal' data-target='#myModal_modif'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               }

        	]
        });
        
    }
    $("#type").click(function(){
    	$.get("{{url('panel/tipo_noti')}}", function(response){
           $("#type").empty();
           for (var i = 0; i < response.length; i++) {
             $("#type").append("<option value='"+response[i].typenew_id+"'>"+response[i].description+"</option>");             
           }
    	});
    });
    
 </script>
@endsection