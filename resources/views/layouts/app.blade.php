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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    <!-- Scripts -->
    @livewireScripts
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="icon" href="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/LOGO-DH-ICONO.ico">
    <div class="paneltop flex shadow-md w-full">
        <a href="{{ route('dashboard') }}">
            <img src="https://raw.githubusercontent.com/AngelManuelCerecedo/ImgDH/main/LOGO-DH-LTv1.png" class="imgtop">
        </a>
        <nav class="">
            <ul class="menu-horizontal flex">
                <i class="bi bi-person-circle inconP"></i>
                <li>
                    <a href="#">
                        {{ auth()->user()->email }}
                    </a>
                    <ul class="menu-vertical">
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <div>
                                <x-jet-dropdown-link class="text-gray-200" href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Salir') }}
                                </x-jet-dropdown-link>
                            </div>
                        </form>
                    </ul>
                </li>
                <i class="bi bi-caret-down-fill down"></i>
            </ul>
        </nav>
    </div>
</head>
@if (auth()->user()->empleado->Rol == 'Mostrador' || auth()->user()->empleado->Rol == 'Encargador de Sucursal')

    <body class="bg-[#D9E0E7]  font-[Open Sans]">
        <div class="">
            @yield('content')
        </div>
        @stack('modals')
        @yield('js')
        <!-- Alertas, sin instalacion, solo con ruta del navegador: https://sweetalert2.github.io/#download -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
@else

    <body class="bg-[#D9E0E7]  font-[Open Sans]">
        <span class="text-black text-4xl top-5 left-4 cursor-pointer mt-12" onclick="Openbar()">
            <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
        </span>

        <div
            class="barra sidebar fixed top-0 bottom-0 lg:left-0 left-[-3200px] duration-1000
          p-2 w-[240px] overflow-y-auto text-center bg-[#FFFFFF] shadow h-screen mt-12">
            <!-- Imagen TOP -->
            <div class="text-black text-xl">
                <div class="portada">
                    <div class="iconport">
                        <i class="bi bi-person-circle"></i>
                    </div>
                    <div class="mt-2 ml-2">
                        {{ auth()->user()->empleado->Nombre }}<br />{{ auth()->user()->empleado->Rol }}<br>{{ auth()->user()->empleado->sucursal->Nombre }}
                    </div>
                </div>
                <!-- LINEA -->
                <hr>
                <!-- INICIO -->
                <div class="mt-4">
                    <a href="{{ route('dashboard') }}">
                        <div class="p-1  flex items-center rounded-md px-2 duration-300 cursor-pointer  resaltado ">
                            <i class="bi bi-house"></i>
                            <span class="ml-4 text-black ">Inicio</span>
                        </div>
                    </a>
                    <!-- CATALOGOS -->
                    <div class="p-1  mt-2 flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado">
                        <i class="bi bi-database"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown1()">
                            <div class="ml-4 text-black hover">Catálogos</div>
                            <span class="text-sm rotate-90" id="arrow1"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                    <div class=" leading-7 text-left text-[13px] w-4/5 mx-auto" id="submoduloCatalogos">
                        <a href="{{ route('Clientes') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Clientes</h1>
                        </a>
                        <a href="{{ route('Proveedores') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Proveedores</h1>
                        </a>
                        <a href="{{ route('Categorias') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Categorias</h1>
                        </a>
                        <a href="{{ route('Marcas') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Marcas</h1>
                        </a>
                        <a href="{{ route('Unidades') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Unidades de Medida</h1>
                        </a>
                        <a href="{{ route('Formas') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Forma de Pago</h1>
                        </a>
                        <a href="{{ route('Metodos') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Metodo de Pago</h1>
                        </a>
                    </div>

                    <!-- ADMINISTRACION -->
                    <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado ">
                        <i class="bi bi-buildings"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown2()">
                            <span class=" ml-4 text-black">Administración</span>
                            <span class="text-sm rotate-90" id="arrow2"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>

                    <div class=" leading-7 text-left text-[13px]  w-4/5 mx-auto" id="submoduloAdministracion">
                        <a href="{{ route('Empleados') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Empleados</h1>
                        </a>
                        <a href="{{ route('Sucursales') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Sucursales</h1>
                        </a>
                        <a href="">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Reportes</h1>
                        </a>
                    </div>

                    <!-- Almacenes -->
                    <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado ">
                        <i class="bi bi-clipboard-check"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown3()">
                            <span class=" ml-4 text-black">Almacén</span>
                            <span class="text-sm rotate-90" id="arrow3"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>

                    <div class=" leading-7 text-left text-[13px]  w-4/5 mx-auto" id="submoduloAlmacenes">
                        <a href="{{ route('Productos') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Productos</h1>
                        </a>
                        <a href="{{ route('Almacenes') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Almacenes</h1>
                        </a>
                        <!-- <a href="">
                    <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Ajustes de Inventario</h1>
                </a>
                <a href="">
                    <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Ajustes de Existencia</h1>
                </a>-->
                        <a href="{{ route('Traspasos') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Traspasos</h1>
                        </a>
                    </div>

                    <!-- OPERACION -->
                    <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado ">
                        <i class="bi bi-graph-up-arrow"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown4()">
                            <span class=" ml-4 text-black">Operación</span>
                            <span class="text-sm rotate-90" id="arrow4"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>

                    <div class=" leading-7 text-left text-[13px]  w-4/5 mx-auto" id="submoduloOperacion">
                        <a href="{{ route('Compras') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Compras</h1>
                        </a>
                        <a href="{{ route('Cotizaciones') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Cotizaciones</h1>
                        </a>
                        <a href="{{ route('Ventas') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Ventas</h1>
                        </a>
                    </div>

                    <!-- CONTABBILIDAD -->
                    <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado ">
                        <i class="bi bi-calculator"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown5()">
                            <span class=" ml-4 text-black">Contabilidad</span>
                            <span class="text-sm rotate-90" id="arrow5"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>

                    <div class=" leading-7 text-left text-[13px]  w-4/5 mx-auto" id="submoduloContabilidad">
                        <a href="">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Facturas</h1>
                        </a>
                        <a href="{{ route('Creditos') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Creditos</h1>
                        </a>
                    </div>
                    <!-- CONFIGURACION -->
                    <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado ">
                        <i class="bi bi-gear"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown6()">
                            <span class=" ml-4 text-black">Configuración</span>
                            <span class="text-sm rotate-90" id="arrow6"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                    <div class=" leading-7 text-left text-[13px]  w-4/5 mx-auto" id="submoduloConfiguracion">
                        <a href="">
                            <h1 class="cursor-pointer  rounded-md  ml-5 MDA">Facturación</h1>
                        </a>
                        <a href="">
                            <h1 class="cursor-pointer  rounded-md  ml-5 MDA">Escala de Precios</h1>
                        </a>
                        <a href="{{ route('Roles') }}">
                            <h1 class="cursor-pointer   rounded-md  ml-5 MDA">Roles</h1>
                        </a>
                    </div>

                    <!-- CERRAR SESION -->
                    <form method="POST" action="{{ route('logout') }}" x-data>
                        @csrf
                        <div class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer resaltado">
                            <i class="bi bi-box-arrow-in-right"></i>
                            <div class="ml-4" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Cerrar Sesión') }}
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="contentm lg:mr-5">
            @yield('content')
        </div>
        @stack('modals')
        <script>
            function dropDown1() {
                document.querySelector('#submoduloCatalogos').classList.toggle('hidden')
                document.querySelector('#arrow1').classList.toggle('rotate-90')
            }
            dropDown1()

            function dropDown2() {
                document.querySelector('#submoduloAdministracion').classList.toggle('hidden')
                document.querySelector('#arrow2').classList.toggle('rotate-90')
            }
            dropDown2()

            function dropDown3() {
                document.querySelector('#submoduloAlmacenes').classList.toggle('hidden')
                document.querySelector('#arrow3').classList.toggle('rotate-90')
            }
            dropDown3()

            function dropDown4() {
                document.querySelector('#submoduloOperacion').classList.toggle('hidden')
                document.querySelector('#arrow4').classList.toggle('rotate-90')
            }
            dropDown4()

            function dropDown5() {
                document.querySelector('#submoduloContabilidad').classList.toggle('hidden')
                document.querySelector('#arrow5').classList.toggle('rotate-90')
            }
            dropDown5()

            function dropDown6() {
                document.querySelector('#submoduloConfiguracion').classList.toggle('hidden')
                document.querySelector('#arrow6').classList.toggle('rotate-90')
            }
            dropDown6()

            function Openbar() {
                document.querySelector('.sidebar').classList.toggle('left-[-300px]')
            }
        </script>
        @yield('js')
        <!-- Alertas, sin instalacion, solo con ruta del navegador: https://sweetalert2.github.io/#download -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </body>
@endif

</html>
