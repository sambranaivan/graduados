<header id="header">
    <div class="container">
        <div class="row">
            <section class="hidden-xs header-contact">
                <div class="col-sm-10 col-md-8">
                    <div class="col-sm-4 col-md-4">
                        <strong>CONSULTAS</strong>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <i class="icon ion-ios-telephone"></i> 3794-4473931
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <i class="icon ion-android-mail"></i> graduados@exa.unne.edu.ar
                    </div>
                </div>
                <div class="col-sm-2 col-md-4 header-social text-right">
                    <a href="https://www.facebook.com/Facultad-de-Ciencias-Exactas-Naturales-y-Agrimensura-Facena-879702205406183/?ref=br_rs">
                        <i class="icon ion-social-facebook"></i>
                    </a>
                    <a href="https://twitter.com/facenaunne">
                        <i class="icon ion-social-twitter"></i>
                    </a>
                </div>
            </section>
            <nav id="header-menu"   >
                <div class="navbar navbar-default">
                    <div class="container-fluid bg-red">
                        <div class="navbar-header bg-red">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/">
                                <img src="{{URL::asset("assets/img/logo_pagina_ok.png") }}" alt="" style="height: 90%;margin:20px;" class="header-logo">
                            </a>
                        </div>
                        <div class="navbar-collapse bg-red collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav" >
                                <li><a style="color:white" href="{{url('/')}}">Inicio</a></li>
                                <li><a style="color:white" href="{{url('/faq')}}">Preguntas frecuentes</a></li>
                                <li><a style="color:white" href="{{url('/cursos')}}">Cursos</a></li>
                                <li><a style="color:white" href="{{url('/ofertas')}}">Ofertas</a></li>
                                <li><a style="color:white" href="{{url('/empresas')}}">Socios estratégicos</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a  style="color:white" href="{{url('/panel')}}">Ingreso</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>