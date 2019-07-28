@extends('layouts.web')
@section('web.title')
	Empresas
@endsection

@section('content')
<section class="content">
	<div class="container">
		<div class="row business">
			<div class="business-header">
				<h3 class="business-title">Empresas y Convenios</h3>
				<p class="business-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui sapiente facere quo modi quas dignissimos porro, cum eaque aspernatur blanditiis voluptatem nihil dolorum, molestias ut enim odio assumenda. Sapiente, doloremque.</p>
			</div>
			<div class="business-content">
                @if($companies->isEmpty())
                    <h3>No hay empresas asociadas, vuelve pronto!</h3>
                @else
                    @foreach($company as $companies)
        				<div class="col-md-4 business-list">
        					<div class="business-list-image">
                            	<img src="{{URL::asset('assets/img/curso-gratuito-tecnico-marketing.jpg')}}" alt="" class="img-responsive">
                        	</div>
        				</div>
                    @endforeach
                @endif
			</div>
		</div>
	</div>
</section>
@endsection