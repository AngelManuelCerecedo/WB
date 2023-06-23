<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl font-[Raleway]-semibold leading-tight mr-80">Metodos de Pago</h2>
            <label class="ml-56 mt-6">Inicio <i class="bi bi-chevron-right"></i> Catálogos <i
                    class="bi bi-chevron-right"></i> Metodos de Pago</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="mt-8 flex flex-row mb-1 sm:mb-0">
                    <div class="relative ml-8">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Buscar" wire:model="search"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    <div class="relative ml-8">
                        <select wire:model="cantidad"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                            <option value="20">20</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="relative ml-72">
                        <a href="{{ route('RMetodos') }}">
                            <button class="botonL">
                                <i class="bi bi-plus-circle-fill"></i>
                                <span class="ml-4 ">Nuevo Metodo de Pago</span>
                            </button>
                        </a>
                    </div>
                    <div class="relative ml-4">
                        <a href="{{ route('Metodos') }}">
                            <button class="botond">
                                <i class="bi bi-download"></i>
                                <span class="ml-4 ">Descargar</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    @if ($metodos->count())
                        <table class="tabla">
                            <thead class="etiqueta">
                                <tr>
                                    <th
                                        class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Acciones
                                    </th>
                                    <th
                                        class="px-8 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Clave
                                    </th>
                                    <th
                                        class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                        Nombre de los Metodos de Pago
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metodos as $metodo)
                                    <tr class="datosT">
                                        <td class="px-5 py-2 border border-gray-200 bg-white">
                                            <div class="flex">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <a href="{{route('EMetodo',[$metodo->id])}}">
                                                        <button class="botonm ml-20 mt-1">
                                                            <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                            <span class="ml-4 ">Detalles</span>
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-3 border border-gray-200 bg-white ">
                                            <p class="text-black whitespace-no-wrap">{{ $metodo->Clave }}</p>
                                        </td>
                                        <td class="px-5 py-3 border border-gray-200 bg-white ">
                                            <p class="text-black whitespace-no-wrap">{{ $metodo->Nombre }}</p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="px-6 py-4">
                            <div class="flex font-sans bg-[#FA5C7C] rounded-lg p-4 mb-4 text-sm text-white"
                                role="alert">
                                <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <div>
                                    <span class="font-medium">Info: </span> No se encontró ningún registro.
                                </div>
                            </div>
                        </div>
                    @endif
                    @if ($metodos->hasPages())
                        <div class="px-6 py-3 etiqueta ">
                            {{ $metodos->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

