@extends('layouts.dashboard')

@section('content')
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
                "defaultContent":"<button type='button' class='btn btn-info'><i class='fa fa-eye' aria-hidden='true'></i> Ver</button><button type='button' class='btn btn-danger'><i class='fa fa-pencil-square-o' aria-hidden='true'></i> Editar</button>" 
               }

        	]
        });
    }

 </script>
@endsection