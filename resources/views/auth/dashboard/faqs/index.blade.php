@extends('layouts.dashboard')
@section('content')

<a href="faqs/create" id="alta" class="btn btn-success pull-left" >Agregar FAQ</a><br><br>

	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body table-responsive no-padding">   
				  <table class="table table-bordered display" id="preguntas" cellspacing="0" width="100%">
				    <thead>
				      <tr>
				      	<th>ID</th>
				        <th>Pregunta</th>
				        <th>Descripcion</th>
				      </tr>
				    </thead>
				    <tbody>
				    @foreach($preguntas as $pregunta)
				      <tr>
				      	<td>{{$pregunta->faq_id}}</td>
				        <td>{{$pregunta->title}}</td>
				        <td>{{$pregunta->description}}</td>
				      </tr>
				     @endforeach
				    </tbody>
				  </table>
		  		</div>
		  	</div>
  		</div>
	</div>

@endsection

@section('script')
	<script type="text/javascript">
		$(document).ready(function() {
    		$('#preguntas').DataTable({
    			"language":{
              		"url": "{{asset('plugins/datatables/Spanish.json')}}"
          		}  
    		});
		} );
	</script>
@endsection