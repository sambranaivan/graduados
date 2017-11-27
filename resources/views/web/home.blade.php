@extends('layouts.web')

@section('content')
<section class="featured">
    <div class="container featured__container">
        <div class="row">
            <div class="featured__image">
                <img src="assets/img/OB82100.jpg" alt="" class="img-responsive">
            </div>
            <div class="featured__wrapper text-center">
                <div class="col-md-12 featured-title">
                    <h2>Lorem ipsum</h2>
                </div>
                <div class="featured__text col-md-12">
                    <p> Suspendisse sed interdum turpis. <br>
                    Nam in euismod risus, nec mollis eros.</p>
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
                <h3>Bienvenidos <span>Egresados</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci libero hic, molestias incidunt, magni laudantium asperiores similique ducimus labore quia, quibusdam architecto illo dolor accusamus! Necessitatibus praesentium, consequuntur provident?</p>
                <a href="" class="welcome__view-more">Leer mas</a>
            </div>
            <div class="hidden-xs col-sm-4 col-md-4 welcome__image">
                <img src="assets/img/bienvenida.png" alt="">
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
                                <img src="{{ $item->photo }}" alt="" class="img-responsive">
                            </div>
                            <div class="caption">
                                <h4>{{ $item->title }}</h4>
                                <p>{{$item->pompadour}}</p>
                                <p class="label label-info">Ver más...</p>
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
                    <div class="new-image">
                        <img src="assets/img/O6ZK030.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">CURSOS</h3>
                        </div>
                        <div class="new-description text-center">
                            <p>SEGUI CAPACITANDOTE CON NUESTROS CURSOS</p>
                        </div>
                        <div class="new-button text-center">
                            <a href="/cursos">Ver cursos</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 new ofertas-laborales">
                    <div class="new-image">
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
                    </div>
                </div>
                <div class="col-xs-12 col-md-4 new eventos">
                    <div class="new-image">
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection