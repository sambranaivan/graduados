<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Portal de Graduados | UNNE</title>

    {!! Html::style('assets/css/bootstrap.min.css') !!}
    {!! Html::style('assets/css/bootstrap-material-design.min.css') !!}
    {!! Html::style('assets/css/font-awesome.min.css') !!}
    {!! Html::style('css/app.css') !!}
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>
<body>
    <header id="header">
        <div class="container">
            <section class="contact">
                <div class="col-md-8">
                    <div class="col-md-4">
                        <strong>CONSULTAS</strong>
                    </div>
                    <div class="col-md-4">
                        <i class="icon ion-ios-telephone"></i> 3794-000000
                    </div>
                    <div class="col-md-4">
                        <i class="icon ion-android-mail"></i> info@unne.com.ar
                    </div>
                </div>
                <div class="col-md-4 social text-right">
                    <a href=""><i class="icon ion-social-facebook"></i></a> 
                    <a href=""><i class="icon ion-social-twitter"></i></a>
                </div>
            </section>
            <nav id="menu">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <img src="" alt="">
                        </div>
                        <div class="navbar-collapse collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="">Home</a></li>
                                <li><a href="">Staff</a></li>
                                <li><a href="">Preguntas frecuentes</a></li>
                                <li><a href="">Cursos</a></li>
                                <li><a href="">Ofertas</a></li>
                                <li><a href="">Empresas</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="javascript:void(0)">Login</a></li>
                                <li><a href="">SIGNUP</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <section id="featured">
        <div class="container">
            <div class="featured-wrapper text-center">
                <div class="col-md-12 featured-title">
                    <h2>Lorem ipsum</h2>
                </div>
                <div class="featured-text col-md-12">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo exercitationem laudantium, modi, esse non molestiae, rerum expedita odio eveniet dignissimos hic. Possimus eos libero veritatis, odio dolore architecto omnis dignissimos.</p>
                </div>
                <div class="featured-link col-md-12">
                    <a href="">Leer Mas</a>
                </div>
            </div>
        </div>
    </section>
    <section id="welcome">
        <div class="container">
            <div class="col-md-8 welcome-message">
                <h3>Bienvenidos <span>Egresados</span></h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta adipisci libero hic, molestias incidunt, magni laudantium asperiores similique ducimus labore quia, quibusdam architecto illo dolor accusamus! Necessitatibus praesentium, consequuntur provident?</p>
                <a href="" class="view-more">Leer mas</a>
            </div>
            <div class="col-md-4 welcome-image">
                <img src="" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
                            <img src="img/primer_dia_clase.jpg" alt="" class="img-responsive">
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
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="" alt="" class="img-responsive footer-logo">
                </div>
                <div class="col-md-2">
                    <a href="">Acerca de</a>
                    <a href="">Staff</a>
                    <a href="">Alumnado</a>
                    <a href="">Empresas</a>
                    <a href="">Desarrolladores</a>
                </div>
                <div class="col-md-2">
                    <a href="">Home</a>
                    <a href="">Noticias</a>
                    <a href="">Cursos</a>
                    <a href="">Oferta laboral</a>
                    <a href="">Galerias</a>
                </div>
                <div class="col-md-2">
                    <a href="">Ayuda</a>
                    <a href="">Registro</a>
                    <a href="">Contacto</a>
                    <p>Tel: 3794-000000</p>
                    <a href="">info@unne.com.ar</a>
                </div>
                <div class="col-md-3 text-right">
                    <a href=""><i class="icon ion-social-facebook"></i></a> 
                    <a href=""><i class="icon ion-social-twitter"></i></a>
                </div>
            </div>
            <div class="row">
                <p class="footer-copyright">© 2017  UNNE Todos los derechos reservados</p>
            </div>
        </div>
    </footer>
</body>
</html>