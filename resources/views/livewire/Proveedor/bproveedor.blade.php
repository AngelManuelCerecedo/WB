<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl font-[Raleway]-semibold leading-tight mr-80">Proveedores</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Catálogos <i
                    class="bi bi-chevron-right"></i> Proveedores</label>
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
                    <div class="relative ml-8">
                        <select wire:model="estatus"
                            class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"">
                            <option value="Todos">Todos</option>
                            <option value="Activo">Activos</option>
                            <option value="Inactivo">Inactivos</option>
                        </select>
                    </div>
                    <div class="relative ml-52">
                        <a href="{{ route('RProveedores') }}">
                            <button class="boton">
                                <i class="bi bi-plus-circle-fill"></i>
                                <span class="ml-4 ">Nuevo Proveedor</span>
                            </button>
                        </a>
                    </div>
                    <div class="relative ml-4">
                        <a href="{{ route('Proveedores') }}">
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
                    @if ($proveedores->count())
                        <table class="min-w-full leading-normal barra" >
                            <thead class="etiqueta">
                                <tr>
                                    <th
                                        class="px-5 py-3 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black uppercase tracking-wider ">
                                        Acciones
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black uppercase tracking-wider ">
                                        RFC
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black uppercase tracking-wider ">
                                        Nombre
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black uppercase tracking-wider r">
                                        Estado
                                    </th>
                                    <th
                                        class="px-5 py-3 border border-gray-200 bg-gray-100 text-left font-[Raleway]-semibold text-black uppercase tracking-wider ">
                                        Tipo
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $proveedor)
                                    <tr class="datosT">
                                        <td class="px-5 py-5 border border-gray-200 bg-white">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    <button class="botonm">
                                                        <i class="bi bi-layout-text-sidebar-reverse"></i>
                                                        <span class="ml-4 ">Detalles</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-5 py-5 border border-gray-200 bg-white ">
                                            <p class="text-black whitespace-no-wrap">{{ $proveedor->RFC }}</p>
                                        </td>
                                        <td class="px-5 py-5 border border-gray-200 bg-white ">
                                            @if ($proveedor->TipoP == 'Moral')
                                                <p>{{ $proveedor->NEMP }}</p>
                                            @else
                                                <p>{{ $proveedor->Nombre }} {{ $proveedor->ApP }}
                                                    {{ $proveedor->ApM }}</p>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border border-gray-200 bg-white">
                                            @if ($proveedor->Estatus == 'Activo')
                                                <span
                                                    class="relative inline-block px-3 py-1 font-[Raleway]-semibold text-green-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Activo</span>
                                                </span>
                                            @else
                                                <span
                                                    class="relative inline-block px-3 py-1 font-[Raleway]-semibold text-orange-900 leading-tight">
                                                    <span aria-hidden
                                                        class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                    <span class="relative">Inactivo</span>
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border border-gray-200 bg-white ">
                                            <p class="text-black whitespace-no-wrap">{{ $proveedor->TipoP }}</p>
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
                    @if ($proveedores->hasPages())
                        <div class="px-6 py-3">
                            {{ $proveedores->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
