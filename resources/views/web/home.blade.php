@extends('layouts.web')

@section('content')
<section class="featured">
    <div class="container featured__container">
        <div class="row">
            <div class="featured__image">
                <img src="{{URL::asset('public/assets/img/OB82100.jpg')}}" alt="" class="img-responsive">
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
<section class="welcome">
    <div class="container welcome__container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 welcome__message">
                <h3>Programa de Seguimiento al Graduado</span></h3>
                <p>Este programa pretende recolectar datos e información, que permitan mejorar la información de contacto y ubicación de nuestros graduados, aspecto elemental para iniciar un proceso de vinculación institucional entre la FaCENA y sus profesionales.
                El sistema SIU-Kolla es una herramienta que permite realizar encuestas on-line a graduados, con el objetivo de obtener información sobre su inserción profesional, su relación con la universidad, el interés por otros estudios y otros datos relevantes. Se trata de encuestas para analizar, diagnosticar y conocer los perfiles de los egresados, y constituye una parte de un proyecto integral que aspira a crear una base de conocimiento sobre la población estudiantil.</p>
                <a href="#" class="welcome__view-more">Leer mas</a>
            </div>
            <div class="hidden-xs col-sm-4 col-md-4 welcome__image">
                <img src="{{URL::asset('public/assets/img/bienvenida.png')}}" alt="">
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
                    <a href="{{url('/noticia')."/$item->new_id" }}" class="new-link">
                        <div class="col-xs-12 col-sm-4 col-md-4 new thumbnail">
                            <div class="new-image">
                                <img src="{{URL::asset("public/$item->photo") }}" alt="" class="img-responsive">
                            </div>
                            <div class="caption caption-half-down">
                                <h4>{{ $item->title }}</h4>
                                <p>{{$item->pompadour}}</p>
                                <p class="label label-info"></p>
                            </div>
                            <div class="caption caption-half-up">
                                <p>
                                    <a class="btn btn-primary" href="{{url('/noticia')."/$item->new_id" }}">Ver más...</a>
                                </p>
                            </div>
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
                        <img src="{{URL::asset('public/assets/img/O6ZK030.jpg')}}" class="img-responsive">
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
                <!--div class="col-xs-12 col-md-4 new cursos">
                    <div class="new-image">
                        <img src="assets/img/O6ZK030.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">CURSOS</h3>
                        </div>
                        <div class="new-description text-center ">
                            <p>SEGUI CAPACITANDOTE CON NUESTROS CURSOS</p>
                        </div>
                        <div class="new-button text-center">
                            <a href="/cursos">Ver cursos</a>
                        </div>
                    </div>
                </div-->
                <div class="col-xs-12 col-md-4 new ofertas-laborales">
                    <!--div class="new-image">
                        <img src="assets/img/OCIG380.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">OFERTAS LABORALES</h3>
                        </div>
                        <div class="new-description text-center">
                            <p>ENCUENTRA OFERTAS LABORALES DE EMPRESAS CONECTADAS CON LA UNNE</p>
                        </div>
                        <div class="new-button text-center">
                            <a href="">Buscar</a>
                        </div>
                    </div-->
                    <div class="thumbnail">
                        <img src="{{URL::asset('public/assets/img/OCIG380.jpg')}}" class="img-responsive">
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
                        <img src="{{URL::asset('public/assets/img/OAYTQA0.jpg')}}" class="img-responsive">
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
                    <!--div class="new-image">
                        <img src="assets/img/OAYTQA0.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">EVENTOS</h3>
                        </div>
                        <div class="new-description text-center">
                            <p>Accede a la agenda de eventos institucionales</p>
                        </div>
                        <div class="new-button text-center">
                            <a href="">Acceder</a>
                        </div>
                    </div-->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection