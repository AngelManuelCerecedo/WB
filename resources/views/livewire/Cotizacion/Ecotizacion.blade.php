<div class="container">
    <div class="py-8">
        <div class="flex mb-4">
            <h2 class="text-4xl titulos mr-96">Cotizacion</h2>
            <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i
                    class="bi bi-chevron-right"></i> Cotizacion</label>
        </div>
        <div class="panel">
            <div class="my-2 flex sm:flex-row flex-col">
                <div class="ml-4 mt-16 flex-col">
                    <div class="md:flex items-center">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Folio de Cotizacion</label>
                            <input type="text" wire:model='Folio' class="inpuS" disabled="false" />
                        </div>
                        <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                            <label class="etiqueta">Sucursal</label>
                            <select wire:model='SO' class="input" disabled="false">
                                <option value="">Seleciona una Opción</option>
                                @foreach ($Sucursales as $sucursal)
                                    <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="md:flex items-center mt-4">
                        <div class="flex flex-col  md:mt-0 mt-4">
                            <label class="etiqueta">Nombre del Cliente</label>
                            <input type="text" wire:model='NombreCliente' class="inputL" disabled="false" />
                        </div>
                    </div>
                    <hr class="my-4">
                    @if ($Estatus == 'Registro')
                        <div class="md:flex items-center" wire:ignore>
                            <select id="select2" class="inputXL">
                                <option value="">Seleccione un Producto</option>
                                @foreach ($Productos as $producto)
                                    <option value="{{ $producto->producto->id }}">{{ $producto->producto->CodigoB }} -
                                        {{ $producto->producto->Nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="number" min="0" wire:model='Cant' class="inpuS ml-8"
                                placeholder="Cantidad" />
                        </div>
                        <div class="md:flex items-center mt-4">
                            @if ($search)
                                <div class="flex flex-col  md:mt-0 mt-4">
                                    <label class="etiqueta">Precio</label>
                                    <select wire:model='PR' class="input">
                                        <option value=""></option>
                                        @if ($Precio->P1 > 0)
                                            <option value="{{ $Precio->P1 }}">${{ $Precio->P1 }} (PUBLICO EN
                                                GENERAL)
                                            </option>
                                        @endif
                                        @if ($Precio->P2 > 0)
                                            <option value="{{ $Precio->P2 }}">${{ $Precio->P2 }} (MEDICOS)</option>
                                        @endif
                                        @if ($Precio->P3 > 0)
                                            <option value="{{ $Precio->P3 }}">${{ $Precio->P3 }}
                                                (CLINICAS,HOSPITALES)
                                            </option>
                                        @endif
                                        @if ($SO == '4')
                                            <option value="{{ $Precio->P4 }}">${{ $Precio->P4 }} (PUEBLA)
                                            </option>
                                        @endif
                                        @if ($SO == '6')
                                            <option value="{{ $Precio->P7 }}">${{ $Precio->P7 }} (GOBIERNO)
                                            </option>
                                        @endif
                                    </select>
                                </div>
                                <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                                    <label class="etiqueta">Cantidad Disponible</label>
                                    <input type="text" wire:model='CD' class="input"
                                        placeholder="Cantidad Disponible" disabled="false" />
                                </div>
                            @endif
                        </div>
                        <div class="md:flex items-center mt-4">
                            <button wire:click="agregarA()" class="botonGP">
                                <i class="bi bi-plus-lg text-lg"></i>
                                <span class="ml-2">Añadir Producto</span>
                            </button>
                        </div>
                    @endif
                </div>
            </div>
            @if ($ListaFT)
                <table class="tabla mt-4">
                    <thead class="etiqueta">
                        <tr>
                            <th
                                class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                Producto
                            </th>
                            <th
                                class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                Cantidad
                            </th>
                            <th
                                class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                Precio Unitario
                            </th>
                            <th
                                class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                Importe
                            </th>
                            <th
                                class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group ">
                        @foreach ($ListaFT as $Producto)
                            <var {{ $Total += $Producto->Importe2 }} />
                            <var {{ $CantTOT += $Producto->Cantidad }} />
                            <tr>
                                <td class="px-5 py-3 border border-gray-200 bg-white ">
                                    <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->Producto->Nombre }}</p>
                                </td>
                                <td class="px-5 py-3 border border-gray-200 bg-white ">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">{{ $Producto->Cantidad }}
                                    </p>
                                </td>
                                <td class="border border-gray-200 bg-white">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">{{ $Producto->Importe1 }}
                                </td>
                                <td class="border border-gray-200 bg-white">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">{{ $Producto->Importe2 }}
                                </td>
                                <td class="border border-gray-200 bg-white">
                                    @if ($Estatus == 'Registro')
                                        <button class="botonei ml-4" wire:click="eliminarP({{ $Producto->id }})">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="block md:table-row-group ">
                        <tr>
                            <td class="px-5 py-3  bg-white ">
                            </td>
                            <td class=" etiquetaT bg-white ">
                                <p class="text-center">{{$CantTOT}}</p>
                            </td>
                            <td class="px-5 py-3  bg-white ">
                            </td>
                            <td class="etiquetaT bg-white ">
                                <p class="text-center">{{$Total}}</p>
                            </td>
                            <td class="px-5 py-3  bg-white ">
                            </td>
                        </tr>
                    </tfoot>
                </table>
            @else
                <div class="px-6 py-4 mt-20">
                    <div class="flex bg-blue-100 rounded-lg p-4 mb-4 text-sm text-blue-700" role="alert">
                        <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <span class="font-medium">Info: </span> Lista vacia
                        </div>
                    </div>
                </div>
            @endif
            <hr class="mt-12 my-2 text-white">
            <div class="flex">
                <div class="ml-12 mt-4 mb-4">
                    <div class="md:flex items-center">
                        <div class="flex flex-col mr-96">
                            <a href="{{ route('Cotizaciones') }}">
                                <button class="botonr">
                                    <i class="bi bi-chevron-left"></i>
                                    Regresar
                                </button>
                            </a>
                        </div>
                        @if ($Estatus == 'Registro')
                            <div class=" ml-64">
                                <button class="botond" wire:click="registrar({{$Total}})">
                                    <i class="bi bi-journal-bookmark"></i>
                                    Guardar
                                </button>
                            </div>
                        @endif
                        @if ($Estatus == 'Iniciado')
                            <div class="ml-20">
                                <button class="botonGP" wire:click="exportar()">
                                    <i class="bi bi-printer"></i>
                                    Imprimir Cotizacion
                                </button>
                            </div>
                            <div class=" ml-8">
                                <button class="botonCP" wire:click="exportar()">
                                    <i class="bi bi-box-arrow-in-up"></i>
                                    Exportar a Venta
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#select2').select2();
        $('#select2').on('change', function(e) {
            let valor = $('#select2').select2("val");
            @this.set('search', valor);
        });
    });
</script>
