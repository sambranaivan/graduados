@extends('layouts.web')
@section('web.title')
Preguntas Frecuentes
@endsection
@section('content')
<section class="content">
	<div class="container">
		<div class="row faq">
			<div class="title-section">
				<h2>Preguntas Frecuentes</h2>
			</div>
			<div class="col-md-12">
				<div class="faq-content">
					<div class="panel-group">
						@foreach($preguntas as $pregunta)
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" href="#{{$pregunta->id}}">{{$pregunta->title}}</a>
									</h4>
								</div>
								<div id="{{$pregunta->id}}" class="panel-collapse collapse">
									<div class="panel-body"><p class="text-justify">{{$pregunta->description}}</p></div>
									@if($pregunta->url_file !='sin contenido')
										<div class="panel-footer"><a href="{{ url('').'/'.$pregunta->url_file}}" target="_blank">Descargar archivos</a></div>
									@endif
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
@endsection