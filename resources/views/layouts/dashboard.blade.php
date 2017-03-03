<!DOCTYPE html>
<html>
<head>
  @include('partials.dashboard._head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
   @include('partials.dashboard._header')
   
  </div>
  <aside class="main-sidebar">
    <section class="sidebar">
      @include('partials.dashboard._menu')
    </section>
  </aside>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        <small>Panel de control</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Panel</li>
      </ol>
    </section>
    <section class="content">
      @include('partials.dashboard._resume')
      @yield('content')
    </section>
  </div>
  @include('partials.dashboard._footer')
  @yield('script')
</body>
</html>
