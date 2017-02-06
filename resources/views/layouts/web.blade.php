<!DOCTYPE html>
<html lang="es">
<head>
    @include('partials.web._head')
</head>
<body>
    @include('partials.web._header')

    @yield('content')
    
    @include('partials.web._footer')
</body>
</html>
