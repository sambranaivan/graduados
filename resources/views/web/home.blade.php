@extends('layouts.web')

@section('content')
<section id="featured">
    <div class="container">
        <div class="row">
            <div class="featured-image">
                <img src="img/Sonar-que-soy-profesora.jpg" alt="" class="img-responsive">
            </div>
            <div class="featured-wrapper text-center">
                <div class="col-md-12 featured-title">
                    <h2>Lorem ipsum</h2>
                </div>
                <div class="featured-text col-md-12">
                    <p> Suspendisse sed interdum turpis. <br>
                    Nam in euismod risus, nec mollis eros.</p>
                </div>
                <div class="featured-link col-md-12">
                    <a href="">Leer Mas</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="welcome">
    <div class="container">
        <div class="row">
            <div class="col-md-8 welcome-message">
                <h3>Bienvenidos <span>Egresados</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci libero hic, molestias incidunt, magni laudantium asperiores similique ducimus labore quia, quibusdam architecto illo dolor accusamus! Necessitatibus praesentium, consequuntur provident?</p>
                <a href="" class="view-more">Leer mas</a>
            </div>
            <div class="col-md-4 welcome-image">
                <img src="img/estudiantes.png" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</section>
<section id="news-institutionals" class="news">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 title">
                <h2 class="text-center">Noticias Institucionales</h2>
            </div>
            <div class="col-md-12">
                <div class="col-md-4 new">
                    <div class="new-image">
                        <img src="img/grado.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3>Noticia</h3>
                        </div>
                        <div class="new-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 new">
                    <div class="new-image">
                        <img src="img/grado.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3>Noticia</h3>
                        </div>
                        <div class="new-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 new">
                    <div class="new-image">
                        <img src="img/grado.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3>Noticia</h3>
                        </div>
                        <div class="new-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
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
                <div class="col-md-4 new cursos">
                    <div class="new-image">
                        <img src="img/curso-gratuito-tecnico-marketing.jpg" alt="" class="img-responsive">
                    </div>
                    <div class="new-content">
                        <div class="new-title">
                            <h3 class="text-center">CURSOS</h3>
                        </div>
                        <div class="new-description text-center">
                            <p>SEGUI CAPACITANDOTE CON NUESTROS CURSOS</p>
                        </div>
                        <div class="new-button text-center">
                            <a href="">Ver cursos</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 new ofertas-laborales">
                    <div class="newimage">
                        <img src="img/contador.jpg" alt="" class="img-responsive">
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
                <div class="col-md-4 new eventos">
                    <div class="image">
                        <img src="img/almeria-Feria-de-las-Ideas-II.jpg" alt="" class="img-responsive">
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