@extends('layouts.web')

@section('web.title')
	Noticias
@endsection

@section('content')
<section class="content">
	<div class="container">
		<div class="row courses">
			<div class="courses-header">
				<h3 class="courses-title">Cursos</h3>
				<p class="courses-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui sapiente facere quo modi quas dignissimos porro, cum eaque aspernatur blanditiis voluptatem nihil dolorum, molestias ut enim odio assumenda. Sapiente, doloremque.</p>
				<a href="" class="course-filter">Filtrar</a>
			</div>
			<div class="courses-content">
                @if($courses->isEmpty())
                    <h3>No hay cursos vigentes, vuelve pronto!</h3>
                @else
                    @foreach($courses as $item)
                        <div class="col-md-4 course">
                            <div class="course-image">
                                <img src="{{asset("/assets/img/photo_news/".$item->photo) }}" alt="" class="img-responsive">
                                {{-- //TODO  arreglar path de imagen en base de datos --}}
                            </div>
                            <div class="course-content">
                                <a href="{{url('/curso')."/$item->new_id" }}" class="course-link">
                                    <div class="course-description text-center">
                                        <p>{{ $item->title }}</p>
                                    </div>
                                </a>
                                {{-- <div class="course-button text-center">
                                    <a href="/curso/{{ $item->new_id }}/inscripcion">Inscribirse</a>
                                </div> --}}
                            </div>
                    </div>
                    @endforeach
                @endif
			</div>
		</div>
	</div>
</section>
@endsection