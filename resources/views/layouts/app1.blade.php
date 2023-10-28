<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>@yield('title')</title>
    <!--FONT GOOGLE-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
    <!-- Styles -->
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    

    <!-- Scripts -->
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/LOGO-DH-ICONO.ico">
    <div class="paneltop flex shadow-md w-full">
        <a href="{{ route('PuntoVenta') }}">
            <img src="https://github.com/AngelManuelCerecedo/ImgDH/blob/main/LOGO-DH-LTv1.png?raw=true" class="imgtop">
        </a>
        <nav class="">
            <ul class="menu-horizontal flex">
                <i class="bi bi-person-circle inconP"></i>
                <li>
                    <a href="#">USUARIO</a>
                    <ul class="menu-vertical">
                        <li><a href="#">Salir</a></li>
                    </ul>
                </li>
                <i class="bi bi-caret-down-fill down"></i>
            </ul>
        </nav>
    </div>
</head>

<body class="bg-[#D9E0E7]  font-[Open Sans]">
    <div class="">
        @yield('content')
    </div>
    @stack('modals')
    @yield('js')
    <!-- Alertas, sin instalacion, solo con ruta del navegador: https://sweetalert2.github.io/#download -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body> 
</html>
