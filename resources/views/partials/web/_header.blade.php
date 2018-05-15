<header id="header">
    <div class="container">
        <div class="row">
            <section class="hidden-xs header-contact">
                <div class="col-sm-10 col-md-8">
                    <div class="col-sm-4 col-md-4">
                        <strong>CONSULTAS</strong>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <i class="icon ion-ios-telephone"></i> 3794-000000
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <i class="icon ion-android-mail"></i> info@unne.com.ar
                    </div>
                </div>
                <div class="col-sm-2 col-md-4 header-social text-right">
                    <a href=""><i class="icon ion-social-facebook"></i></a>
                    <a href=""><i class="icon ion-social-twitter"></i></a>
                </div>
            </section>
            <nav id="header-menu">
                <div class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="/">
                                <img src="{{URL::asset("assets/img/unne.png") }}" alt="" class="img-responsive header-logo">
                            </a>
                        </div>
                        <div class="navbar-collapse collapse navbar-responsive-collapse">
                            <ul class="nav navbar-nav">
                                <li><a href="{{url('/')}}">Inicio</a></li>
                                <li><a href="{{url('/faq')}}">Preguntas frecuentes</a></li>
                                <li><a href="{{url('/cursos')}}">Cursos</a></li>
                                <li><a href="{{url('/ofertas')}}">Ofertas</a></li>
                                <li><a href="{{url('/empresas')}}">Socios estratégicos</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/ingreso">Ingreso</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>