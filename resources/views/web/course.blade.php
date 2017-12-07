@extends('layouts.web')

@section('web.title')
Cursos
@endsection

@section('content')
<section class="content">
	<div class="container">
		<div class="row new">
			<div class="col-md-8">
				@foreach($new as $noticia)
				<div class="new-header">
					<img src="{{URL::asset("public/$noticia->photo") }}" alt="" class="img-responsive">
					<h4 class="new-title">{{$noticia->title}} <small>{{$noticia->pompadour}}</small></h4>
				</div>
				<div class="new-content">
					<p>{{$noticia->body}}</p>
				</div>
				@endforeach
			</div>
			<div class="col-md-4">

			</div>
		</div>
	</div>
</section>
@endsection