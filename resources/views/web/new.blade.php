@extends('layouts.web')

@section('web.title')
Noticias
@endsection

@section('content')
<section class="content">
	<div class="container">
		<div class="row new">
			@foreach($new as $noticia)
			<div class="col-md-6">

					<div class="new-header">
						<img src="{{url($noticia->photo)}}" alt="" class="new-image">
					</div>

			</div>
			<div class="col-md-6">
				<h4 class="new-title">{{$noticia->title}}</h4>
				<h6 class="new-title"><small>{{$noticia->pompadour}}</small></h6>
				<p>{{$noticia->body}}</p>
			</div>
			@endforeach
		</div>
	</div>
</section>
@endsection