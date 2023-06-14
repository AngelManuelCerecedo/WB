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
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="bg-[#D9E0E7]  font-[Raleway]">

    <span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Openbar()">
        <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>

    <div class="barra sidebar fixed top-0 bottom-0 lg:left-0 left-[-3200px] duration-1000
              p-2 w-[250px] overflow-y-auto text-center bg-[#313a46] shadow h-screen">
        <!-- Imagen TOP -->
        <div class="text-white text-xl">
            <div>
                <img src="https://github.com/AngelManuelCerecedo/ImgDH/blob/main/LOGO-DH.png?raw=true" class="img">
                <i class="bi bi-x ml-20 cursor-pointer lg:hidden" onclick="Openbar()"></i>
            </div>
            <!-- LINEA -->
            <hr class="my-2 text-white">
            <div class="mt-4">
                <!-- INICIO -->
                <a href="{{ route('dashboard') }}">
                    <div
                        class="p-1  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                        <i class="bi bi-house"></i>
                        <span class="text-[15px] ml-4 text-white ">Inicio</span>
                    </div>
                </a>
                <!-- CATALOGOS -->
                    <div
                        class="p-1  mt-2 flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                        <i class="bi bi-database"></i>
                        <div class="flex justify-between w-full items-center" onclick="dropDown1()">
                            <span class="text-[15px] ml-4 text-white">Catálogos</span>
                            <span class="text-sm rotate-90" id="arrow1"><i class="bi bi-chevron-right"></i>
                            </span>
                        </div>
                    </div>
                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto" id="submoduloCatalogos">
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5">Clientes</h1>
                    </a>
                    <a href="{{ route('Proveedores') }}">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Proveedores</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Categorias</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Marcas</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Unidades de Medida</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Forma de Pago</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Metodo de Pago</h1>
                    </a>
                </div>

                <!-- ADMINISTRACION -->
                <div
                    class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                    <i class="bi bi-buildings"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown2()">
                        <span class="text-[15px] ml-4 text-white">Administración</span>
                        <span class="text-sm rotate-90" id="arrow2"><i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto"
                    id="submoduloAdministracion">
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Empleados</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Sucursales</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Reportes</h1>
                    </a>
                </div>

                <!-- Almacenes -->
                <div
                    class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                    <i class="bi bi-clipboard-check"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown3()">
                        <span class="text-[15px] ml-4 text-white">Almacén</span>
                        <span class="text-sm rotate-90" id="arrow3"><i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto" id="submoduloAlmacenes">
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 mt--3 ">Productos</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Inventario</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Ajustes de Inventario</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Ajustes de Existencia</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Traspasos</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Compras</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Almacenes</h1>
                    </a>
                </div>

                <!-- OPERACION -->
                <div
                    class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                    <i class="bi bi-graph-up-arrow"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown4()">
                        <span class="text-[15px] ml-4 text-white">Operación</span>
                        <span class="text-sm rotate-90" id="arrow4"><i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto" id="submoduloOperacion">
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Licitaciones</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Jornadas</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Facturas</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Cotizaciones</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Ventas</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Gastos</h1>
                    </a>
                </div>

                <!-- CONTABBILIDAD -->
                <div
                    class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                    <i class="bi bi-calculator-fill"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown5()">
                        <span class="text-[15px] ml-4 text-white">Contabilidad</span>
                        <span class="text-sm rotate-90" id="arrow5"><i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>

                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto"
                    id="submoduloContabilidad">
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Usos de CFDI</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Cuentas por Pagar</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Cuentas por Cobrar</h1>
                    </a>
                </div>
                <!-- CONFIGURACION -->
                <div
                    class="p-1 mt-2  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                    <i class="bi bi-gear"></i>
                    <div class="flex justify-between w-full items-center" onclick="dropDown6()">
                        <span class="text-[15px] ml-4 text-white">Configuración</span>
                        <span class="text-sm rotate-90" id="arrow6"><i class="bi bi-chevron-right"></i>
                        </span>
                    </div>
                </div>
                <div class=" leading-7 text-left text-[13px] font-[Raleway] w-4/5 mx-auto"
                    id="submoduloConfiguracion">
                    <a href="">
                        <h1 class="cursor-pointer hover:bg-[#D5C28B] rounded-md  ml-5 ">Facturación</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer hover:bg-[#D5C28B] rounded-md  ml-5 ">Escala de Precios</h1>
                    </a>
                    <a href="">
                        <h1 class="cursor-pointer  hover:bg-[#D5C28B] rounded-md  ml-5 ">Permisos</h1>
                    </a>
                </div>

                <!-- CERRAR SESION -->
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <div
                        class="p-1  flex items-center rounded-md px-2 duration-300 cursor-pointer  hover:bg-[#D5C28B]">
                        <i class="bi bi-box-arrow-in-right"></i>
                        <x-jet-dropdown-link class="text-white text-[15px]" href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                            {{ __('Cerrar Sesión') }}
                        </x-jet-dropdown-link>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="content mx-20 lg:ml-80 lg:mr-5">
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
    @livewireScripts
    @yield('js')
    <!-- Alertas, sin instalacion, solo con ruta del navegador: https://sweetalert2.github.io/#download -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
