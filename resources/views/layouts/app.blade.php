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
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        @livewireStyles
        @livewireScripts
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <header class="bg-white w-full">
            <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="dashboard" class="-m-1.5 p-1.5">
                        <span class="sr-only">Your Company</span>
                        <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                            alt="">
                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                <div class="hidden lg:flex lg:gap-x-12">
                    <div class="relative">
                        <button id="productButton" type="button"
                            class="flex items-center gap-x-1 text-sm font-semibold leading-6 text-gray-900"
                            aria-expanded="false">
                            Catálogos
                            <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Menu desplegable de "Product" -->
                        <div id="productMenu"
                            class="absolute -left-8 top-full z-10 mt-3 w-screen max-w-md overflow-hidden rounded-3xl bg-white shadow-lg ring-1 ring-gray-900/5 hidden">
                            <div class="p-4">
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 14.984A6.017 6.017 0 0012 14c-1.383 0-2.668.445-3.732 1.188m3.732-1.188a4.5 4.5 0 100-9 4.5 4.5 0 000 9zm0 0c1.654 0 3.298.603 4.732 1.684C19.368 17.096 20 19.02 20 21H4c0-1.98.632-3.904 1.768-5.316A7.977 7.977 0 0112 14z" />
                                        </svg>
                                        
                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('Clientes') }}" class="block font-semibold text-gray-900  group-hover:text-red-600">
                                            Clientes
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v14h18V7M9 3h6v4H9z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 14h4M10 10h4M10 18h4" />
                                        </svg>    
                                    </div>
                                    <div class="flex-auto">
                                        <a href="{{ route('Empresas') }}"class="block font-semibold text-gray-900 group-hover:text-red-600">
                                            Empresas
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>
                                <div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 group-hover:text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V7M5 5h14a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 11v0M14 11v0M12 11v0M12 15v0" />
                                        </svg> 
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900  group-hover:text-red-600">
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
                                        <a href="#" class="block font-semibold text-gray-900  group-hover:text-red-600">
                                            Metodos de Pago
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>
                                <!--<div
                                    class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm leading-6 hover:bg-gray-50">
                                    <div
                                        class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-gray-50 group-hover:bg-white">
                                        <svg class="h-6 w-6 text-gray-600 group-hover:text-indigo-600" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M3.75 3v11.25m0 0A3.75 3.75 0 007.5 18h3.75a3.75 3.75 0 003.75-3.75V9a3.75 3.75 0 013.75-3.75H21M3.75 14.25L8.5 9m0 0h2.25M8.5 9v7.5" />
                                        </svg>
                                    </div>
                                    <div class="flex-auto">
                                        <a href="#" class="block font-semibold text-gray-900">
                                            Automations
                                            <span class="absolute inset-0"></span>
                                        </a>
                                        <p class="mt-1 text-gray-600">Build strategic funnels that will drive</p>
                                    </div>
                                </div>-->
                            </div>
                            <!--<div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                                <a href="#"
                                    class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M2 10a8 8 0 1116 0 8 8 0 01-16 0zm8-4.5a.75.75 0 00-.75.75v2.5H6.5a.75.75 0 000 1.5h2.75v2.5a.75.75 0 001.5 0v-2.5H13.5a.75.75 0 000-1.5H10.75v-2.5A.75.75 0 0010 5.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    New Product
                                </a>

                                <a href="#"
                                    class="flex items-center justify-center gap-x-2.5 p-3 text-sm font-semibold leading-6 text-gray-900 hover:bg-gray-100">
                                    <svg class="h-5 w-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.5 2.75A.75.75 0 016.25 2h7.5a.75.75 0 01.75.75v1.5a.75.75 0 01-.75.75h-7.5a.75.75 0 01-.75-.75v-1.5zm-1.5 4A.75.75 0 015 6.5h10a.75.75 0 01.75.75v10a.75.75 0 01-.75.75H5a.75.75 0 01-.75-.75v-10zM8 8.25A.75.75 0 018.75 8h2.5a.75.75 0 010 1.5h-2.5A.75.75 0 018 8.25zM9.25 12a.75.75 0 000 1.5h1.5a.75.75 0 000-1.5h-1.5z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    New Feature
                                </a>
                            </div>-->
                        </div>
                    </div>

                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Finanzas</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Contabilidad</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Contraloria</a>
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900"></a>
                </div>
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                    <a href="#" class="text-sm font-semibold leading-6 text-gray-900">Log in <span
                            aria-hidden="true">&rarr;</span></a>
                </div>
            </nav>
        </header>

        <body>
            @yield('content')
        </body>
        <script>
            // Selecciona el botón del menú de "Product"
            const productButton = document.getElementById('productButton');

            // Selecciona el menú desplegable de "Product"
            const productMenu = document.getElementById('productMenu');

            // Función para alternar la visibilidad del menú desplegable de "Product"
            function toggleProductMenu() {
                productMenu.classList.toggle('hidden');
            }
            // Agrega un evento de clic al botón del menú de "Product" que llame a la función toggleProductMenu
            productButton.addEventListener('click', toggleProductMenu);
        </script>
    </body>


    </html>
