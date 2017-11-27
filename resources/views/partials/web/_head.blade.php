<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>@yield('web.title', "Portal de Graduados") | UNNE</title>

{!! Html::style('assets/css/bootstrap.min.css') !!}
{!! Html::style('assets/css/bootstrap-material-design.min.css') !!}
{!! Html::style('assets/css/font-awesome.min.css') !!}
{!! Html::style('css/app.css') !!}
<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<style type="text/css" media="screen">
.thumbnail {
    position:relative;
    overflow:hidden;
}

.caption {
    position:absolute;
    top:0;
    right:0;
    background:rgba(66, 139, 202, 0.75);
    width:100%;
    height:100%;
    padding:2%;
    display: none;
    text-align:center;
    color:#fff !important;
    z-index:2;
}
</style>