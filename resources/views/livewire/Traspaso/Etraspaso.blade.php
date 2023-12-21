<div class="container">
    @if (auth()->user()->empleado->Rol == 'Mostrador')
        <div class="py-8 ml-32 mt-8">
        @else
            <div class="py-8">
    @endif
    <div class="flex mb-4">
        <h2 class="text-4xl titulos mr-96">Traspaso</h2>
        <label class="ml-96 mt-6">Inicio <i class="bi bi-chevron-right"></i> Almacén <i class="bi bi-chevron-right"></i>
            Traspasos</label>
    </div>
    <div class="panel">
        <div class="my-2 flex sm:flex-row flex-col">
            <div class="ml-4 mt-16 flex-col">
                <div class="md:flex items-center">
                    <div class="flex flex-col  md:mt-0 mt-4">
                        <label class="etiqueta">Folio de Traspaso</label>
                        <input type="text" wire:model='Folio' class="inpuS" disabled="false" />
                    </div>
                    <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                        <label class="etiqueta">Estado</label>
                        <input type="text" wire:model='Estatus' class="inpuS" disabled="false" />
                    </div>
                    <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                        <label class="etiqueta">Observaciones</label>
                        <input type="text" wire:model='Obs' class="inputL" placeholder="Observaciones"
                            disabled="false" />
                    </div>
                </div>
                <div class="md:flex items-center mt-4">
                    <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                        <label class="etiqueta">Sucursal Origen</label>
                        <select wire:model='SO' class="input" disabled="false">
                            <option value="">Seleciona una Opción</option>
                            @foreach ($Sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                            @endforeach
                            <option value="7">Almacén General</option>
                        </select>
                    </div>
                    <div class="flex flex-col  md:mt-0 mt-4">
                        <label class="etiqueta">Sucursal Destino</label>
                        <select wire:model='SD' class="input" disabled="false">
                            <option value="">Seleciona una Opción</option>
                            @foreach ($Sucursales as $sucursal)
                                <option value="{{ $sucursal->id }}">{{ $sucursal->Nombre }}</option>
                            @endforeach
                            <option value="7">Almacén General</option>
                        </select>
                    </div>
                    <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                        <label class="etiqueta">Cantidad Disponible</label>
                        <input type="text" wire:model='CD' class="input" placeholder="Cantidad Disponible"
                            disabled="false" />
                    </div>
                </div>
                @if ($Estatus == 'Registro')
                    <div class="md:flex items-center mt-8" wire:ignore>
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
                            Código de Barras
                        </th>
                        <th
                            class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                            Nombre
                        </th>
                        <th
                            class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                            Cantidad
                        </th>
                        <th
                            class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                            Acciones
                        </th>
                    </tr>
                </thead>
                <tbody class="block md:table-row-group ">
                    @foreach ($ListaFT as $Producto)
                        <tr>
                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->Producto->CodigoB }}</p>
                            </td>
                            <td class="px-5 py-3 border border-gray-200 bg-white ">
                                <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->Producto->Nombre }}</p>
                            </td>
                            <td class="border border-gray-200 bg-white">
                                <p class="text-gray-900 whitespace-no-wrap text-center">{{ $Producto->Cantidad }}
                            </td>
                            <td>
                                @if ($Estatus == 'Registro')
                                    <button class="botone" wire:click="eliminarP({{ $Producto->id }})">
                                        <i class="bi bi-trash3"></i>
                                        <span class="ml-2 ">Eliminar</span>
                                    </button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
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
                        @if (auth()->user()->empleado->Rol == 'Mostrador')
                            <a href="{{ route('PuntoVenta') }}">
                            @else
                                <a href="{{ route('Traspasos') }}">
                        @endif
                        <button class="botonr">
                            <i class="bi bi-chevron-left"></i>
                            Regresar
                        </button>
                        </a>
                    </div>
                    @if ($Estatus == 'Registro')
                        <div class="ml-64">
                            <button class="botoni" wire:click="registrar()">
                                <i class="bi bi-box2"></i>
                                Iniciar
                            </button>
                        </div>
                    @endif
                    @if ($Estatus == 'Iniciado')
                        <div class="ml-64">
                            <button class="botone" wire:click="terminar()">
                                <i class="bi bi-box2"></i>
                                Terminar
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
