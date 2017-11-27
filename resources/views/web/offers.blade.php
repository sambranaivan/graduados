@extends('layouts.web')

@section('web.title')
	Ofertas
@endsection

@section('content')
<section class="content">
	<div class="container">
		<div class="row offers">
			<div class="offers-header">
				<h3 class="offers-title">Ofertas</h3>
				<p class="offers-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui sapiente facere quo modi quas dignissimos porro, cum eaque aspernatur blanditiis voluptatem nihil dolorum, molestias ut enim odio assumenda. Sapiente, doloremque.</p>
				<a href="" class="course-filter">Filtrar</a>
			</div>
			<div class="offers-content">
                @if($offers->isEmpty())
                    <h3>No hay ofertas vigentes, vuelve pronto!</h3>
                @else
                    @foreach($offers as $item)
                    <div class="col-md-4 course">
                       <div class="course-image">
                           <img src="{{ $item->photo }}" alt="" class="img-responsive">
                       </div>
                       <div class="course-content">
                        <a href="/oferta/{{ $item->new_id }}" class="course-link">

                            <div class="course-description text-center">
                                <p>{{ $item->title }}</p>
                            </div>
                        </a>
                        <div class="course-button text-center">
                            <a href="/oferta/{{ $item->new_id }}/inscripcion">Postularme</a>
                        </div>
                    </div>
                </div>

                    @endforeach
                @endif
			</div>
		</div>
	</div>
</section>
@endsection