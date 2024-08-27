    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <link rel="icon" href="{{ asset('Imagenes/WB.ico') }}">

        <title>@yield('title')</title>
        <!--FONT GOOGLE-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <header class="bg-white w-full" style="margin-top: -20px">
        <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="{{ route('dashboard') }}" class="-m-1.5 p-1.5">
                    <img class="h-20 w-50" src="{{ asset('Imagenes/WB.jpg') }}" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button id="mobileMenuButton" type="button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700"
                    aria-label="Open menu">
                    <span class="sr-only">Menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>

            <!-- Menú móvil -->
            <div id="mobileMenu" class="fixed inset-0 bg-white z-50 hidden">
                <div class="p-4">
                    <button id="closeMobileMenuButton" type="button" class="text-gray-700">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="mt-4">
                        <button id="categoriaButtonMobile" type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900">
                            Catálogos
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="productMenuMobile" class="hidden mt-2">
                            <!-- Aquí agregas las opciones de "Catálogos" para móviles -->
                            <a href="{{ route('Clientes') }}"
                                class="block text-sm font-semibold text-gray-900">Clientes</a>
                            <a href="{{ route('Comisionistas') }}"
                                class="block text-sm font-semibold text-gray-900">Comisionistas</a>
                            <a href="{{ route('Empresas') }}"
                                class="block text-sm font-semibold text-gray-900">Empresas</a>
                            <a href="{{ route('Beneficiarios') }}"
                                class="block text-sm font-semibold text-gray-900">Beneficiarios</a>
                            <a href="{{ route('Formas') }}" class="block text-sm font-semibold text-gray-900">Formas de
                                Pago</a>
                            <a href="{{ route('Metodos') }}" class="block text-sm font-semibold text-gray-900">Metodos
                                de Pago</a>
                            <a href="{{ route('Empleados') }}"
                                class="block text-sm font-semibold text-gray-900">Usuarios</a>
                        </div>
                        <button id="finanzasButtonMobile" type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 mt-4">
                            Finanzas
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="finanzasMenuMobile" class="hidden mt-2">
                            <!-- Aquí agregas las opciones de "Finanzas" para móviles -->
                            <a href="{{ route('FichasI') }}" class="block text-sm font-semibold text-gray-900">Ficha de
                                Identificacion de Depositos</a>
                            <a href="{{ route('FichasG') }}" class="block text-sm font-semibold text-gray-900">Ficha de
                                Identificacion de Gastos</a>
                        </div>
                        <button id="facturacionButtonMobile" type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900 mt-4">
                            Facturación
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <div id="facturacionMenuMobile" class="hidden mt-2">
                            <!-- Aquí agregas las opciones de "Finanzas" para móviles -->
                            <a href="{{ route('FichasI') }}" class="block text-sm font-semibold text-gray-900">Ficha
                                de
                                Identificacion de Depositos</a>
                            <a href="{{ route('FichasG') }}" class="block text-sm font-semibold text-gray-900">Ficha
                                de
                                Identificacion de Gastos</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <div class="relative">
                    <button id="categoriaButton" type="button"
                        class="finanzas-button flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false">
                        Catálogos
                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>
                    <!-- Menu desplegable de "CATALOGOS" -->
                    <div id="productMenu"
                        class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5 hidden">
                        <div class="p-4">
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M15.232 14.984A6.017 6.017 0 0012 14c-1.383 0-2.668.445-3.732 1.188m3.732-1.188a4.5 4.5 0 100-9 4.5 4.5 0 000 9zm0 0c1.654 0 3.298.603 4.732 1.684C19.368 17.096 20 19.02 20 21H4c0-1.98.632-3.904 1.768-5.316A7.977 7.977 0 0112 14z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('Clientes') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Clientes
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <!-- Figura de persona -->
                                        <circle cx="12" cy="7" r="3" stroke="currentColor"
                                            stroke-width="2" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 10v6m-4 0h8m-4-6a5 5 0 00-5 5v4a5 5 0 005 5 5 5 0 005-5v-4a5 5 0 00-5-5z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('Comisionistas') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Comisionistas
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7v14h18V7M9 3h6v4H9z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 14h4M10 10h4M10 18h4" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a
                                        href="{{ route('Empresas') }}"class="block font-semibold text-gray-900 group-hover:text-red-600">
                                        Empresas
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M17 20h5v-1a4 4 0 00-3-3.87M17 20H7M17 20a3 3 0 01-6 0M7 20H2v-1a4 4 0 013-3.87M7 20a3 3 0 006 0M15 10a4 4 0 01-4 4M9 10a4 4 0 118 0M7 14a4 4 0 110-8M7 14a4 4 0 004-4M7 14a4 4 0 01-4-4" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('Beneficiarios') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Beneficiarios
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M10 11v0M14 11v0M12 11v0M12 15v0" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('Formas') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Formas de Pago
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('Metodos') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Metodos de Pago
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">

                                @if (auth()->user()->empleado->Rol != 'Finanzas')
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 20h5v-1a4 4 0 00-3-3.87M17 20H7M17 20a3 3 0 01-6 0M7 20H2v-1a4 4 0 013-3.87M7 20a3 3 0 006 0M15 10a4 4 0 01-4 4M9 10a4 4 0 118 0M7 14a4 4 0 110-8M7 14a4 4 0 004-4M7 14a4 4 0 01-4-4" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('Empleados') }}"
                                            class="block font-semibold text-gray-900 group-hover:text-red-600">
                                            Usuarios
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <button id="finanzasButton" type="button"
                        class="finanzas-button flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                        aria-expanded="false">
                        Finanzas
                        <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                            aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                clip-rule="evenodd" />
                        </svg>
                    </button>


                    <!-- Menu desplegable de "FINANZAS" -->
                    <div id="finanzasMenu"
                        class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5 hidden">
                        <div class="p-4">
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <!-- Documento -->
                                        <!-- Signo de dólar con flecha ascendente -->
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 18V12m0 0l3 3m-3-3l-3 3m3-6V6" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('FichasI') }}"
                                        class="block font-semibold text-gray-900  group-hover:text-red-600">
                                        Ficha de Identificacion de Depositos
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                            <div
                                class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                <div
                                    class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <!-- Signo de dólar con flecha descendente -->
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6m0 0l-3-3m3 3l3-3m-3 6v6" />
                                    </svg>
                                </div>
                                <div class="flex-auto">
                                    <a href="{{ route('FichasG') }}"
                                        class="block font-semibold text-gray-900 group-hover:text-red-600">
                                        Ficha de Identificacion de Gastos
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Menu "FACTURACION" -->
                @if (auth()->user()->empleado->Rol != 'Finanzas')
                    <div class="relative">
                        <button id="facturacionButton" type="button"
                            class="finanzas-button flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                            aria-expanded="false">
                            Facturación
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <!-- Menu desplegable de "FACTURACION" -->
                        <div id="facturacionMenu"
                            class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5 hidden">
                            <div class="p-4">
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M12 6v12" stroke-linecap="round" stroke-linejoin="round" />
                                            <!-- Flecha hacia abajo -->
                                            <path d="M15 14l-3 3-3-3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('Facturas') }}"
                                            class="block font-semibold text-gray-900  group-hover:text-red-600">
                                            Facturación de Depositos
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path d="M12 6v12" stroke-linecap="round" stroke-linejoin="round" />
                                            <!-- Flecha hacia arriba -->
                                            <path d="M15 10l-3-3-3 3" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>

                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('FichasG') }}"
                                            class="block font-semibold text-gray-900 group-hover:text-red-600">
                                            Facturación de Transferencias
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
                
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Contabilidad</a>
                <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Contraloria</a>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <div>
                        <a class="text-sm font-semibold leading-6 text-black-900" href="{{ route('logout') }}"
                            @click.prevent="$root.submit();">
                            {{ __('Salir') }} <span aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </form>
            </div>
        </nav>
        <div id="mobile-menu" class="hidden lg:hidden">
            <a href="#" class="block text-sm font-semibold leading-6 text-gray-900">Contabilidad</a>
            <a href="#" class="block text-sm font-semibold leading-6 text-gray-900">Contraloria</a>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <a class="block text-sm font-semibold leading-6 text-black-900" href="{{ route('logout') }}"
                    @click.prevent="$root.submit();">
                    {{ __('Salir') }}
                </a>
            </form>
        </div>
    </header>

    <body>
        @yield('content')
    </body>
    <script>
        var userRole = "{{ auth()->user()->empleado->Rol }}";
        if (userRole !== 'Finanzas')
        {
            document.addEventListener('DOMContentLoaded', function() {
                // Selecciona los elementos de escritorio
                const categoriaButton = document.getElementById('categoriaButton');
                const productMenu = document.getElementById('productMenu');
                const finanzasButton = document.getElementById('finanzasButton');
                const finanzasMenu = document.getElementById('finanzasMenu');
                const facturacionButton = document.getElementById('facturacionButton'); // Nuevo
                const facturacionMenu = document.getElementById('facturacionMenu'); // Nuevo
    
                // Selecciona los elementos móviles
                const mobileMenuButton = document.getElementById('mobileMenuButton');
                const mobileMenu = document.getElementById('mobileMenu');
                const closeMobileMenuButton = document.getElementById('closeMobileMenuButton');
                const categoriaButtonMobile = document.getElementById('categoriaButtonMobile');
                const productMenuMobile = document.getElementById('productMenuMobile');
                const finanzasButtonMobile = document.getElementById('finanzasButtonMobile');
                const finanzasMenuMobile = document.getElementById('finanzasMenuMobile');
                const facturacionButtonMobile = document.getElementById('facturacionButtonMobile'); // Nuevo
                const facturacionMenuMobile = document.getElementById('facturacionMenuMobile'); // Nuevo
    
                // Función para alternar la visibilidad del menú desplegable de "Categorías" en escritorio
                function toggleProductMenu() {
                    if (!finanzasMenu.classList.contains('hidden')) {
                        finanzasMenu.classList.add('hidden');
                    }
                    if (!facturacionMenu.classList.contains('hidden')) { // Nuevo
                        facturacionMenu.classList.add('hidden');
                    }
                    productMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú desplegable de "Finanzas" en escritorio
                function toggleFinanzasMenu() {
                    if (!productMenu.classList.contains('hidden')) {
                        productMenu.classList.add('hidden');
                    }
                    if (!facturacionMenu.classList.contains('hidden')) { // Nuevo
                        facturacionMenu.classList.add('hidden');
                    }
                    finanzasMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú desplegable de "Facturación" en escritorio
                function toggleFacturacionMenu() { // Nuevo
                    if (!productMenu.classList.contains('hidden')) {
                        productMenu.classList.add('hidden');
                    }
                    if (!finanzasMenu.classList.contains('hidden')) {
                        finanzasMenu.classList.add('hidden');
                    }
                    facturacionMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú móvil
                function toggleMobileMenu() {
                    mobileMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú de "Categorías" en el móvil
                function toggleProductMenuMobile() {
                    productMenuMobile.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú de "Finanzas" en el móvil
                function toggleFinanzasMenuMobile() {
                    finanzasMenuMobile.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú de "Facturación" en el móvil
                function toggleFacturacionMenuMobile() { // Nuevo
                    facturacionMenuMobile.classList.toggle('hidden');
                }
    
                // Agrega eventos de clic para los botones de escritorio
                categoriaButton.addEventListener('click', toggleProductMenu);
                finanzasButton.addEventListener('click', toggleFinanzasMenu);
                facturacionButton.addEventListener('click', toggleFacturacionMenu);
    
                // Agrega eventos de clic para los botones móviles
                mobileMenuButton.addEventListener('click', toggleMobileMenu);
                closeMobileMenuButton.addEventListener('click', toggleMobileMenu);
                categoriaButtonMobile.addEventListener('click', toggleProductMenuMobile);
                finanzasButtonMobile.addEventListener('click', toggleFinanzasMenuMobile);
                facturacionButtonMobile.addEventListener('click', toggleFacturacionMenuMobile);
    
                // Cierra los menús si se hace clic fuera de ellos
                document.addEventListener('click', function(event) {
                    if (!categoriaButton.contains(event.target) && !productMenu.contains(event.target)) {
                        productMenu.classList.add('hidden');
                    }
                    if (!finanzasButton.contains(event.target) && !finanzasMenu.contains(event.target)) {
                        finanzasMenu.classList.add('hidden');
                    }
                    if (!facturacionButton.contains(event.target) && !facturacionMenu.contains(event
                            .target)) { // Nuevo
                        facturacionMenu.classList.add('hidden');
                    }
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target) && !
                        closeMobileMenuButton.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                    if (!categoriaButtonMobile.contains(event.target) && !productMenuMobile.contains(event
                            .target)) {
                        productMenuMobile.classList.add('hidden');
                    }
                    if (!finanzasButtonMobile.contains(event.target) && !finanzasMenuMobile.contains(event
                            .target)) {
                        finanzasMenuMobile.classList.add('hidden');
                    }
                    if (!facturacionButtonMobile.contains(event.target) && !facturacionMenuMobile.contains(event
                            .target)) {
                        facturacionMenuMobile.classList.add('hidden');
                    }
                });
            });
        }else{
                document.addEventListener('DOMContentLoaded', function() {
                // Selecciona los elementos de escritorio
                const categoriaButton = document.getElementById('categoriaButton');
                const productMenu = document.getElementById('productMenu');
                const finanzasButton = document.getElementById('finanzasButton');
                const finanzasMenu = document.getElementById('finanzasMenu');
    
                // Selecciona los elementos móviles
                const mobileMenuButton = document.getElementById('mobileMenuButton');
                const mobileMenu = document.getElementById('mobileMenu');
                const closeMobileMenuButton = document.getElementById('closeMobileMenuButton');
                const categoriaButtonMobile = document.getElementById('categoriaButtonMobile');
                const productMenuMobile = document.getElementById('productMenuMobile');
                const finanzasButtonMobile = document.getElementById('finanzasButtonMobile');
                const finanzasMenuMobile = document.getElementById('finanzasMenuMobile');
    
                // Función para alternar la visibilidad del menú desplegable de "Categorías" en escritorio
                function toggleProductMenu() {
                    if (!finanzasMenu.classList.contains('hidden')) {
                        finanzasMenu.classList.add('hidden');
                    }
                    productMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú desplegable de "Finanzas" en escritorio
                function toggleFinanzasMenu() {
                    if (!productMenu.classList.contains('hidden')) {
                        productMenu.classList.add('hidden');
                    }
                    finanzasMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú móvil
                function toggleMobileMenu() {
                    mobileMenu.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú de "Categorías" en el móvil
                function toggleProductMenuMobile() {
                    productMenuMobile.classList.toggle('hidden');
                }
    
                // Función para alternar la visibilidad del menú de "Finanzas" en el móvil
                function toggleFinanzasMenuMobile() {
                    finanzasMenuMobile.classList.toggle('hidden');
                }
    
                // Agrega eventos de clic para los botones de escritorio
                categoriaButton.addEventListener('click', toggleProductMenu);
                finanzasButton.addEventListener('click', toggleFinanzasMenu);
    
                // Agrega eventos de clic para los botones móviles
                mobileMenuButton.addEventListener('click', toggleMobileMenu);
                closeMobileMenuButton.addEventListener('click', toggleMobileMenu);
                categoriaButtonMobile.addEventListener('click', toggleProductMenuMobile);
                finanzasButtonMobile.addEventListener('click', toggleFinanzasMenuMobile);
    
                // Cierra los menús si se hace clic fuera de ellos
                document.addEventListener('click', function(event) {
                    if (!categoriaButton.contains(event.target) && !productMenu.contains(event.target)) {
                        productMenu.classList.add('hidden');
                    }
                    if (!finanzasButton.contains(event.target) && !finanzasMenu.contains(event.target)) {
                        finanzasMenu.classList.add('hidden');
                    }
                    if (!mobileMenuButton.contains(event.target) && !mobileMenu.contains(event.target) && !
                        closeMobileMenuButton.contains(event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                    if (!categoriaButtonMobile.contains(event.target) && !productMenuMobile.contains(event
                            .target)) {
                        productMenuMobile.classList.add('hidden');
                    }
                    if (!finanzasButtonMobile.contains(event.target) && !finanzasMenuMobile.contains(event
                            .target)) {
                        finanzasMenuMobile.classList.add('hidden');
                    }
                });
            });
        }
    </script>
</html>
