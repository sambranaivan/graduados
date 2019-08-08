@extends('layouts.web')

@section('content')
<section class="featured">
    <div class="container featured__container">
        <div class="row">
            <div class="featured__image">
                <img src="{{URL::asset('assets/img/OB82100.jpg')}}" alt="" class="img-responsive">
            </div>
            <div class="featured__wrapper text-center">
                <div class="col-md-12 featured-title">
                    <h2>Portal de graduados</h2>
                </div>
                <div class="featured__text col-md-12">
                    <p> Facultad de Ciencias Exactas y Naturales y Agrimensura<br>
                    Universidad Nacional del Nordeste</p>
                </div>
                <div class="featured__link col-md-12">
                    <a href="">Leer Mas</a>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="news news-institutionals">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 title">
                <h2 class="text-center">Noticias Institucionales</h2>
            </div>
            <div class="col-md-12">
                @foreach($news as $item)
                    <a href="{{url('/curso')."/$item->new_id" }}" class="new-link">
                        <div class="col-xs-12 col-sm-4 col-md-4 new thumbnail">
                            <div class="new-image">
                                <img src="{{URL::asset("/assets/img/photo_news/$item->photo") }}" alt="" class="img-responsive">
                            </div>
                            <div class="caption caption-half-down">
                                <h4>{{ $item->title }}</h4>
                                <p>{{$item->pompadour}}</p>
                                <p class="label label-info"></p>
                            </div>
                            {{-- <div class="caption caption-half-up">
                                <p>
                                    <a class="btn btn-primary" href="{{url('/curso')."/$item->new_id" }}">Ver más...</a>
                                </p>
                            </div> --}}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</section>
<section id="news-interests" class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 title">
                <h2 class="text-center">Novedades de interés</h2>
            </div>
            <div class="col-md-12">
                <div class="col-xs-12 col-md-4 new cursos">
                    <div class="thumbnail">
                        <img src="{{URL::asset('assets/img/O6ZK030.jpg')}}" class="img-responsive">
                        <div class="caption caption-half-down">
                            <br><br><br>
                            <p>SEGUI CAPACITANDOTE CON NUESTROS CURSOS</p>
                        </div>
                        <div class="caption caption-half-up">
                            <p>
                                <a class="btn btn-primary" href="{{url('/cursos')}}">Ver cursos</a>
                            </p>
                        </div>

                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">CURSOS</h3>
                        </div>
                    </div>
                </div>
               
                <div class="col-xs-12 col-md-4 new ofertas-laborales">
                 
                    <div class="thumbnail">
                        <img src="{{URL::asset('assets/img/OCIG380.jpg')}}" class="img-responsive">
                        <div class="caption caption-half-down">
                            <br><br><br>
                            <p>ENCUENTRA OFERTAS LABORALES DE EMPRESAS CONECTADAS CON LA UNNE</p>
                        </div>
                        <div class="caption caption-half-up">
                            <p>
                                <a class="btn btn-primary" href="{{url('/ofertas')}}">Buscar</a>
                            </p>
                        </div>

                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">OFERTAS LABORALES</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 new eventos">
                    <div class="thumbnail">
                        <img src="{{URL::asset('assets/img/OAYTQA0.jpg')}}" class="img-responsive">
                        <div class="caption caption-half-down">
                            <br><br><br>
                            <p>ACCEDE A LA AGENDA DE EVENTOS INSTITUCIONALES</p>
                        </div>
                        <div class="caption caption-half-up">
                            <p>
                                <a class="btn btn-primary" href="#">Acceder</a>
                            </p>
                        </div>

                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">EVENTOS</h3>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="news welcome">
    <div class="container welcome__container">
        <div class="row">
             <div class="col-md-4 col-md-offset-4 title">
                <h2 class="text-center">Sobre el programa</h2>
            </div>
            <div class="col-xs-12 col-sm-8 col-md-8 welcome__message">
                        <h4><strong>Programa de Seguimiento al Graduado</strong></h4>
        <p class="text-justify">Este programa tiene como finalidad la implementación de una encuesta electrónica online que permita relevar información actualizada y periódica sobre aspectos de incumbencia profesional del graduado, su inserción laboral y relación con la universidad, a los fines de analizar y conformar un perfil del graduado.

        El SIU-KOLLA es una encuesta online diseñado a estos efectos, favoreciendo el seguimiento a los graduados.</p>

        {{-- Resolución del Consejo Directivo (Nº 3610/14) --}}

        <h4><strong>Observatorio Laboral</strong></h4>
        <p class="text-justify">La creación de un Observatorio Laboral constituye un espacio desde el cual se podrá abordar el análisis de los procesos de inserción laboral de los graduados y los factores que influyen en sus oportunidades, y a partir de ello, generar instrumentos que favorezcan el acceso a la demanda de profesionales en la región.</p>

        <h4><strong>Programa de Capacitación Profesional</strong></h4>
        <p class="text-justify">Este programa desarrolla acciones destinadas a la formación continua de los graduados, a la gestión y elaboración de actividades de capacitación que tiendan a la actualización, perfeccionamiento y especialización profesional, actuando como un componente de valor en el perfil curricular.</p>
                        
                    </div>
                    <div class="hidden-xs col-sm-4 col-md-4 welcome__image">
                        <img src="{{URL::asset('assets/img/bienvenida.png')}}" alt="">
                    </div>
                </div>
            </div>
</section>
@endsection