<div>
    @if ($modalAÑ)
        @include('livewire.compra.modalAl')
    @endif
    <div class="container">
        <div class="py-8">
            <div class="flex mb-4">
                <h2 class="text-4xl titulos mr-96">Compra</h2>
                <label class="ml-80 mt-6">Inicio <i class="bi bi-chevron-right"></i> Operación <i
                        class="bi bi-chevron-right"></i> Compra</label>
            </div>
            <div class="panel">
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="ml-4 mt-16 flex-col">
                        <div class="md:flex items-center">
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Folio de Cotizacion</label>
                                <input type="text" wire:model='Folio' class="input" disabled="false" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Estatus</label>
                                <input type="text" wire:model='Estatus' class="input" disabled="false" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8 ">
                                <label class="etiqueta">Fecha</label>
                                <input type="date" wire:model='Fecha' disabled="false" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4">
                                <label class="etiqueta">Almacen Destino</label>
                                <input type="text" wire:model='SD' disabled="false" />
                            </div>
                        </div>
                        <div class="md:flex items-center mt-4">
                            <div class="flex flex-col  md:mt-0 mt-4 mr-8">
                                <label class="etiqueta">Tipo de Compra</label>
                                <input type="text" wire:model='TC' class="input" disabled="false" />
                            </div>
                            <div class="flex flex-col  md:mt-0 mt-4">
                                <label class="etiqueta">Proveedor</label>
                                <input type="text" wire:model='Proveedor_id' class="inputL" disabled="false" />
                            </div>
                        </div>
                        <div class="md:flex items-center mt-4">
                        </div>
                        <div class="md:flex items-center mt-4">
                            <div class="flex flex-col  md:mt-0 mr-4">
                                <label class="etiqueta">Importe de la Compra</label>
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        <input type="text" wire:model='IC'
                                            class="inputImportes text-right font-weight: bold" disabled="false">
                                    </b>
                                </div>
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                                <label class="etiqueta">Importe Total</label>
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        <input type="text" wire:model='IT' class="inputImportes text-right"
                                            disabled="false">
                                    </b>
                                </div>
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-4">
                                <label class="etiqueta">Descuento</label>
                                <div class=" border border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        @if ($Estatus == 'Registro')
                                            <input type="text" wire:model='DESC'
                                                class="inputImporteDesblo text-right" placeholder="0">
                                        @else
                                            <input type="text" wire:model='DESC' class="inputImportes text-right"
                                                disabled="false" placeholder="0">
                                        @endif
                                    </b>
                                </div>
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                                <label class="etiqueta">Importe Pagado</label>
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        @if ($Estatus == 'Registro')
                                            <input type="text" wire:model='IP' class="inputImporteDesblo text-right"
                                                placeholder="0">
                                        @else
                                            <input type="text" wire:model='IP' class="inputImportes text-right"
                                                disabled="false" placeholder="0">
                                        @endif
                                    </b>
                                </div>
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-4" wire:ignore>
                                <label class="etiqueta">Importe por Pagar</label>
                                <div class=" border  border-[2px] flex rounded-md">
                                    <button class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                        <i class="bi bi-currency-dollar"></i>
                                    </button>
                                    <b>
                                        <input type="text" wire:model='IporP' class="inputImportes text-right"
                                            disabled="false">
                                    </b>
                                </div>
                            </div>
                        </div>
                        <div class="md:flex items-center mt-4">
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Fecha del Credito</label>
                                @if ($TC == 'Credito')
                                    <input type="date" wire:model='FC' class="inputImporteDesblo" />
                                @else
                                    <input type="date" wire:model='FC' class="inputImportes" disabled="false" />
                                @endif
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8">
                                <label class="etiqueta">Fecha limite de Pago</label>
                                @if ($TC == 'Credito')
                                    <input type="date" wire:model='FLC' class="inputImporteDesblo" />
                                @else
                                    <input type="date" wire:model='FLC' class="inputImportes" disabled="false" />
                                @endif
                            </div>
                            <div class="flex flex-col  md:mt-0 mr-8 ">
                                <label class="etiqueta">Observaciones</label>
                                <input type="text" wire:model='Obs' class="inputL"
                                    placeholder="Observaciones de la Compra" disabled="false" />
                            </div>
                        </div>
                        <hr class="my-4">
                        @if ($Estatus == 'Registro')
                            <div class="md:flex items-center" wire:ignore>
                                <select id="select1" class="inputXL">
                                    <option value="">Seleccione un Producto</option>
                                    @foreach ($Productos as $producto)
                                        <option value="{{ $producto->producto->id }}">
                                            {{ $producto->producto->CodigoB }}
                                            -
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
                                        <label class="etiqueta">Precio Base</label>
                                        <div class=" border border-[2px] flex rounded-md">
                                            <button
                                                class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                                <i class="bi bi-currency-dollar"></i>
                                            </button>
                                            <b>
                                                <input type="text" wire:model='PB'
                                                    class="inputImporteDesblo text-right" disabled="false">
                                            </b>
                                        </div>
                                    </div>
                                    <div class="flex flex-col  md:mt-0 mt-4 ml-8">
                                        <label class="etiqueta">Precio Compra</label>
                                        <div class=" border border-[2px] flex rounded-md">
                                            <button
                                                class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                                <i class="bi bi-currency-dollar"></i>
                                            </button>
                                            <b>
                                                <input type="text" wire:model='PC'
                                                    class="inputImporteDesblo text-right" placeholder="0">
                                            </b>
                                        </div>
                                    </div>
                                    <div class="flex flex-col  ml-8">
                                        <label class="etiqueta">Descuento a Producto</label>
                                        <div class=" border border-[2px] flex rounded-md">
                                            <button
                                                class="flex items-center bg-gray-300 justify-center w-8 h-9 text-black">
                                                <i class="bi bi-currency-dollar"></i>
                                            </button>
                                            <b>
                                                <input type="text" wire:model='DescP'
                                                    class="inputImporteDesblo text-right" placeholder="0">
                                            </b>
                                        </div>
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
                                    Precio Base
                                </th>
                                <th
                                    class="px-3 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                    Cantidad
                                </th>
                                <th
                                    class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                    Precio de Compra
                                </th>
                                <th
                                    class="px-5 py-1 border border-gray-200 bg-gray-100 text-center  font-[Raleway]-semibold text-black  tracking-wider ">
                                    Importe
                                </th>
                                <th
                                    class="px-5 py-1 border border-gray-200 bg-gray-100 text-left  font-[Raleway]-semibold text-black  tracking-wider ">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group etiquetaTABLACOMP ">
                            @foreach ($ListaFT as $Producto)
                                <var {{ $CantTOT += $Producto->Cantidad }} />
                                <var {{ $ImporteP = $Producto->Cantidad * $Producto->PrecioC }} />
                                <var {{ $Total += $ImporteP }} />
                                <tr>
                                    <td class="py-4 border border-gray-200 bg-white ">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $Producto->Producto->Nombre }}
                                        </p>
                                    </td>
                                    <td class="border border-gray-200 bg-white ">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            ${{ $Producto->Producto->Precio }}
                                        </p>
                                    </td>
                                    <td class="border border-gray-200 bg-white">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            {{ $Producto->Cantidad }}
                                        </p>
                                    </td>
                                    <td class="border border-gray-200 bg-white">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            ${{ $Producto->PrecioC }}
                                        </p>
                                    </td>
                                    <td class="border border-gray-200 bg-white">
                                        <p class="text-gray-900 whitespace-no-wrap text-center">
                                            ${{ number_format($ImporteP, 5) }}
                                        </p>
                                    </td>
                                    <td class="border border-gray-200 bg-white text-center">
                                        @if ($Estatus == 'Registro')
                                            <button class="botonei" wire:click="eliminarP({{ $Producto->id }})">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                            <button class="botoneAL "
                                                wire:click="agregarLot({{ $Producto->producto_id }})">
                                                <i class="bi bi-plus-lg"></i>
                                            </button>
                                        @endif
                                        @if ($Estatus == 'Ingresada')
                                            <button class="botoneAL "
                                                wire:click="agregarLot({{ $Producto->producto_id }})">
                                                <i class="bi bi-exclamation-lg"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @if ($Producto->Desc)
                                    <tr>
                                        <td class="py-1 border border-gray-200 bg-white ">
                                            <p class="text-gray-900 whitespace-no-wrap">DESCUENTO A PRODUCTO
                                            </p>
                                        </td>
                                        <td class="border border-gray-200 bg-white ">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                            </p>
                                        </td>
                                        <td class="border border-gray-200 bg-white">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                            </p>
                                        </td>
                                        <td class="border border-gray-200 bg-white">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                            </p>
                                        </td>
                                        <td class="border border-gray-200 bg-white">
                                            <p class="text-gray-900 whitespace-no-wrap text-center">
                                                ${{ number_format($Producto->Desc, 5) }}
                                            </p>
                                        </td>
                                        <td class="border border-gray-200 bg-white">
                                        </td>
                                        <var {{ $Total -= $Producto->Desc }} />
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                        <tfoot class="block md:table-row-group ">
                            <tr>
                                <td class="">
                                </td>
                                <td class="">
                                </td>
                                <td class="etiquetaT">
                                    <b>
                                        <p class="text-center">{{ $CantTOT }}</p>
                                    </b>
                                </td>
                                <td class="">
                                </td>
                                <td class="etiquetaT bg-white">
                                    <b>
                                        <p class="text-center">${{ number_format($Total, 5) }}</p>
                                    </b>
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
                                <a href="{{ route('Compras') }}">
                                    <button class="botonr">
                                        <i class="bi bi-chevron-left"></i>
                                        Regresar
                                    </button>
                                </a>
                            </div>
                                @if ($this->Estatus == 'Ingresada')
                                <div class="ml-10">
                                    <button class="botonCP" wire:click="ingresar()">
                                        <i class="bi bi-download"></i>
                                        Aceptar Compra
                                    </button>
                                </div>
                                <div class="ml-10 ">
                                    <button class="botonRC" wire:click="rechazar()">
                                        <i class="bi bi-download"></i>
                                        Rechazar Compra
                                    </button>
                                </div>
                                @endif
                                @if ($this->Estatus == 'Registro')
                                <div class=" ml-64">
                                    <button class="botond" wire:click="registrar()">
                                        <i class="bi bi-journal-bookmark"></i>
                                        Guardar
                                    </button>
                                </div>
                                @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('#select1').select2();
        $('#select1').on('change', function(e) {
            let valor = $('#select1').select2("val");
            @this.set('search', valor);
        });
    });
</script>
